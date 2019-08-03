<?php

namespace Modules\Front\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Modules\Comment\Entities\Comment;
use Modules\Front\Jobs\SendEmail;
use Modules\Photo\Entities\Photo;
use Modules\Post\Entities\Plan;
use Modules\Post\Entities\Post;
use Modules\Trip\Entities\Trip;
use Modules\Trip\Entities\TripCategory;
use Modules\Trip\Http\Requests\TripUpdateFormRequest;
use Modules\Trip\Repositories\TripCategoryRepository;
use Modules\User\Entities\Follow;

use Modules\User\Entities\User;
use Modules\User\Jobs\UserResetPassword;

use Modules\User\Http\Requests\UserStoreFormRequest;
use Modules\User\Repositories\UserRepository;
use Modules\Video\Entities\Video;
use Modules\Video\Http\Requests\VideoStoreFormRequest;
use Modules\Common\Services\LocalFiles;

class FrontController extends BaseController
{
    use LocalFiles;


    public function index()
    {
        $title = __('front::front.hello_estgmam');
        $date = $date = date('Y-m-d');
        $ads = Post::all()->where('status', 'active')->where('started_at', '<=', $date)->where('ended_at', '>', $date);

        $photos = Photo::with(['translations'])->where('user_id', '=', null)->orderBy('created_at', 'desc')->limit(8)->get();
        return view('front::index', compact('photos','ads','title'));
    }

    public function login_get()
    {
        $title = __('front::front.login');
        if (auth()->check()) {
            return redirect()->route('front_index');
        } else {
            return view('front::pages.login',compact('title'));
        }
    }

    public function login_post(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->route('front_index')->with('success', trans('admin::admin.logged_success'));
        } else {
            return back();
        }
    }

    public function profile()
    {
        $title = __('front::front.profile');
        $trips = Trip::with(['translations']);
        return view('front::pages.profile', compact('trips','title'));
    }

    public function createOfPost()
    {
        $title = __('front::front.create_post');
        return view('front::pages.post.create',compact('title'));
    }


    public function createOfTrip(TripCategoryRepository $tripCategRepository)
    {
        $categories = $tripCategRepository->all();
        return view('front::pages.trip.create', compact('categories'))->with('success', trans('adminpanel::adminpanel.created'));
    }

    public function myOffers()
    {
        $title = __('front::front.myoffers');
        return view('front::pages.trip.myoffers',compact('title'));
    }

    public function myTrip($id)
    {
        $title = __('front::front.my_trip');
        $trip = Trip::find($id);
        return view('front::pages.trip.mytrips', compact('trip','title'));
    }

    public function updateMyTrips(TripUpdateFormRequest $request, $id)
    {
        $data = $request->validated();

        $trip = Trip::find($id);


        $data = array_filter($data);

        $trip->update($data);

        $trip->categories()->sync($data['categories'], true);

        return redirect()->back()->with('success', trans('adminpanel::adminpanel.updated'));
    }

    public function showMyInfo()
    {
        $title = __('front::front.myinfo');
        return view('front::pages.mydetails',compact('title'));
    }

    public function editMyInfo(Request $request)
    {

        $user = User::find(auth()->user()->id);

        $data = $request->validate([
            'full_name' => 'required|min:3',
            'country' => 'required',
            'state' => 'required',
            'phone' => 'required|digits_between:7,15',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|min:5',
        ]);
        if ($request->password !== null) {
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = bcrypt($user->password);
        }
        //dd($data);
        $user->update($data);
        return redirect()->route('profile')->with('success', trans('adminpanel::adminpanel.updated'));
    }

    public function myLanguage()
    {
        $title = __('front::front.mylanguage');
        return view('front::pages.myLanguage',compact('title'));
    }

    public function allcats()
    {
        $title = __('front::front.allcats');
        $all_cats = TripCategory::with(['translations'])->where('parent_id', '!=', null)->orderBy('created_at', 'desc')->get();
        return view('front::pages.categories.allcats', compact('all_cats','title'));
    }

    public function singleCat($id)
    {
        $title = __('front::front.single_cat');
        $category = TripCategory::with(['translations', 'child', 'parent', 'trips'])->where('id', $id)->first();
        $date = $date = date('Y-m-d');
        $activeCats = $category->trips->where('status', 'active')->where('started_at', '<=', $date)->where('ended_at', '>', $date);
        return view('front::pages.categories.single', compact('category', 'activeCats','title'));
    }

    public function single_trip($title)
    {
        $trip = Trip::with(['user', 'destinations', 'album'])->where('boat_title', str_replace('-', ' ', $title))->first();
        return view('front::pages.trip.single_trip', compact('trip','title'));
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('front_index')->with('success', trans('adminpanel::adminpanel.logout_message'));
    }

    public function register()
    {
        $title = __('front::front.register');
        return view('front::pages.register',compact('title'));
    }


    public function register_post(UserStoreFormRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $this->storeFile('image', 'users');
        $data = array_filter($data);
        $data['password'] = bcrypt($request->password);
        $user = $this->userRepository->create($data);

        auth()->loginUsingId($user->id);
        return redirect()->route('front_index')->with('success', trans('front::front.created_new_user'));
    }

	public function forgot_password() {
        $title = __('front::front.forget_password');
		return view('front::auth.forgot_password',compact('title'));
	}

	public function do_forgot_password() {

		$data = request()->validate([

			'email' => ['required', 'email', 'exists:users,email'],

		]);

		$user = User::where('email', $data['email'])->first();

		$token = str_random(32);

		User::createResetPassword($data, $token);

		dispatch(new UserResetPassword($token, $user))->delay(now()->addSeconds(5));

		return back()->with('success', 'The Link Reset Send');
	}

	public function reset_password($token) {

		$reset_password = User::getResetPasswordByToken($token);

		if ($reset_password) {

			return view('front::auth.passwords.reset')->with(['reset_password' => $reset_password, 'title' => 'Reset Password']);

		} else {

			return redirect()->route('forgot_password')->with('status', 'Please Send Reset Link Again');
		}
	}

	public function do_reset_password($token) {

		request()->validate([
			'email' => 'required|exists:users,email',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',
		]);

		$reset_password = User::getResetPasswordByToken($token);

		if ($reset_password) {

			User::deleteResetPassword($token);

			$user = User::updatePassword($reset_password);

			return redirect()->route('user.login')->with('success', 'You Can Login With New Password');

		} else {

			return redirect()->route('forgot_password')->with('error', 'Please Send Reset Link Again');
		}
	}

	public function personal_page($id) {
		$user = User::find($id);
		$title = __('front::front.user');
		return view('front::pages.trip.personal_page', compact('user','title'));
	}

	public function followUser($id) {

		$data = [

			'reciever_id' => $id,
			'sender_id' => auth()->user()->id,

		];

		Follow::create($data);

		return back();

	}

	public function removeFollow($id)
    {

        $data = [

            'reciever_id' => $id,
            'sender_id' => auth()->user()->id,

        ];

        Follow::where($data)->delete();
        return back();
    }

    public function gallery()
    {
        $title = __('front::front.photos');
        return view('front::pages.photos',compact('title'));
    }

    public function all_gallery()
    {
        $title = __('front::front.photos');
        $photos = Photo::query()->where('user_id','=',null)->get();

        return view('front::pages.all_photos',compact('title','photos'));
    }

    public function create_photo(PhotoStoreFormRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $this->storeFile('image', 'photos');
        $data = array_filter($data);
        $data['user_id'] = auth()->user()->id;
        //dd($data);
        $photo = Photo::create($data);

        return back()->with('success', trans('adminpanel::adminpanel.created'));
    }


    public function view_video()
    {
        $title = __('front::front.videos');
        return view('front::pages.videos',compact('title'));
    }

    public function all_video()
    {
        $title = __('front::front.videos');
        $videos = Video::query()->where('user_id','=',null)->get();
        return view('front::pages.all_videos',compact('title','videos'));
    }


    public function create_video(VideoStoreFormRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $this->storeFile('image', 'videos');
        $data = array_filter($data);
        $data['user_id'] = auth()->user()->id;
        $video = Video::create($data);
        return back()->with('success', trans('adminpanel::adminpanel.created'));
    }

    public function add_comment(Request $request)
    {
        $data = $request->validate(['comment' => 'required', 'trip_id' => 'required']);
        $data['user_id'] = auth()->user()->id;
        $comment = Comment::create($data);

        return back();
    }


    public function add_ads()
    {
        $title = __('front::front.add_ads');
        if (auth()->user()->use_free_trial == 'yes'){
            $plans = Plan::query()->skip(1)->take(50)->get();
        }else{
            $plans = Plan::all();
        }
        return view('front::pages.create_ads',compact('plans','title'));
    }

    public function add_ads_post(Request $request)
    {
        $rules = [
            'desc'    => 'required|min:3',
            'plan_id' => 'required|exists:plans,id',
            'image'   => 'sometimes',
            'photo1'  => 'required',
            'photo2'  => 'sometimes',
            'photo3'  => 'sometimes',
            'photo4'  => 'sometimes',
            'photo5'  => 'sometimes',
            'photo6'  => 'sometimes',
        ];
        if ($request->plan_id == 1 && auth()->user()->user_free_trial == 'yes'){
            return back()->with('danger',__('front::front.error_trial'));
        }

        $data = $request->validate($rules);
        $data['started_at'] = Carbon::now();
        if ($request->plan_id == 1){
            $data['ended_at'] = Carbon::now()->addDays(3);
            $user = User::find(auth()->user()->id)->update(['use_free_trial' => 'yes']);
        }else{
            $data['ended_at'] = Carbon::now()->addDays(7);
        }

        if ($request->image !== null ){
            $uploadedImage = $request->file('image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('upload/posts/posts/');
            $uploadedImage->move($destinationPath, $imageName);
            $uploadedImage->image = $destinationPath . $imageName;
                $data['image'] = $imageName;
        }

        for ($i = 1; $i<7; $i++){
            if ($request->has('photo'.$i) and $request->photo.$i !== null ){
                $uploadedImage = $request->file('photo'.$i);
                $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
                $destinationPath = public_path('upload/posts/');
                $uploadedImage->move($destinationPath, $imageName);
                $uploadedImage->image = $destinationPath . $imageName;
                $data['photo'.$i] = $imageName;
            }
        }


        $data = array_filter($data);

        $data['user_id'] = auth()->user()->id;
        $post = Post::create($data);

        return redirect()->route('front_index')->with('success',trans('adminpanel::adminpanel.created'));
    }


    public function show_ads()
    {
        $title = __('front::front.show_ads');
        return view('front::pages.my_ads',compact('title'));
    }

    public function edit_ads($id)
    {
        $title = __('front::front.edit_ads');
        $post = Post::find($id);
        if ( auth()->user()->id == $post->user_id && $post->plan_id == \request()->ad_type ){
            $plans = Plan::all();
            return view('front::pages.edit_ads',compact('plans','post','title'));
        }else{
            abort(404);
        }

    }

    public function update_ads(Request $request ,$id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('front_index')->with('success',trans('adminpanel::adminpanel.updated'));
    }

    public function show_ads_gettto($id)
    {
        $title = __('front::front.show_ads');
        $post = Post::find($id);
        if (auth()->user()->id == $post->user_id){
            return view('front::pages.show_ads_gettto',compact('post','title'));
        }
    }

    public function final_show_ad($id)
    {
        $title = __('front::front.show_ads');
        $date = $date = date('Y-m-d');
        $post = Post::where('id',$id)->where('status', 'active')->where('started_at', '<=', $date)->where('ended_at', '>', $date)->first();
        //dd($post);
        if ($post !== null){
            return view('front::pages.final_show_ad',compact('post','title'));
        }else{
            abort(404);
        }
    }

    public function commission()
    {
        $title = __('config::config.commission');
        return view('front::pages.commission',compact('title'));
    }

    public function install_advertising()
    {
        $title = __('config::config.install_advertising');
        return view('front::pages.install_advertising',compact('title'));
    }

    public function laws()
    {
        $title = __('config::config.laws');
        return view('front::pages.laws',compact('title'));
    }

    public function why_banned()
    {
        $title = __('config::config.why_banned');
        return view('front::pages.why_banned',compact('title'));
    }

    public function what_i_do()
    {
        $title = __('config::config.what_i_do');
        return view('front::pages.what_i_do',compact('title'));
    }

    public function contact() {
        $title = __('config::config.contact_us');
        return view('front::pages.contact',compact('title'));
    }

    public function contact_post() {

        $data = request()->validate([

            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required',

        ]);

        $data['reciever'] = env('MAIL_FROM_ADDRESS', 'info@estgmam.com');

        SendEmail::dispatch($data)->delay(Carbon::now()->addSeconds(5));

        return back()->with('success', 'Data Send Successfully');

    }
}

