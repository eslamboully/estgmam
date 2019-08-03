<?php

namespace Modules\Post\Http\Controllers;

use App\DataTables\PostDatatable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Common\Services\LocalFiles;
use Modules\Post\Entities\Plan;
use Modules\Post\Http\Requests\PostStoreFormRequest;
use Modules\Post\Http\Requests\PostUpdateFormRequest;
use Modules\Post\Repositories\PostAlbumRepository;
use Modules\Post\Repositories\PostRepository;
use Modules\Post\Entities\Post;
class PostsController extends Controller
{
    use LocalFiles;

    public function __construct( PostRepository $postRepository, PostAlbumRepository $postPicRepository) {
        $this->postRepository = $postRepository;
        $this->postPicRepository = $postPicRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(PostDatatable $postDatatable) {

        $title = trans('post::post.posts');
        return $postDatatable->render('post::posts.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        $title = trans('adminpanel::adminpanel.add_new');
        $plans = Plan::all();
        return view('post::posts.create', compact('title','plans'));
    }

    /**
     * Show specified resource.
     *
     * @param int $id
     *
     * @return response
     */
    public function show($id) {
        $post = $this->postRepo->find($id);

        return view('post::Post.show', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(PostStoreFormRequest $request) {

        $data = $request->validated();

        $this->storeFile('image', 'posts');

        for ($i = 1; $i<7; $i++){
            if ($request->has('photo'.$i) and $request->photo.$i !== null ){
                $this->storeFile('photo'.$i, 'posts');
            }
        }

        $data = array_filter($data);

        $post = $this->postRepository->create($data);


        return redirect()->route('posts.index', $post)->with('success', trans('post::post.created_and_continue_to_choose_album'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id) {
        $post = $this->postRepository->find($id);

        $title = trans('adminpanel::adminpanel.edit');
        $plans = Plan::all();
        return view('post::posts.edit', compact('post', 'title','plans'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(PostUpdateFormRequest $request, $id) {
        $data = $request->validated();

        $post = $this->postRepository->find($id);

        $data['image'] = $this->deleteAndStoreNewFile($post->image, 'image', 'posts/posts');

        $data = array_filter($data);

        $this->postRepository->update($post, $data);

        return redirect()->route('posts.index')->with('success', trans('adminpanel::adminpanel.updated'));
    }

    public function ajax_edit(Request $request)
    {
        $post = Post::find($request->id);
        if ($post->status == 'active'){
            $post->update(['status' => 'pending']);
        }else{
            $post->update(['status' => 'active']);
        }
        return $post;
    }

    public function destroy($id) {
        $post = $this->postRepository->find($id);

        $this->postRepository->destroy($id);

        $this->deleteFile($post->image);

        return back()->with('success', trans('adminpanel::adminpanel.deleted'));
    }

}
