<?php

namespace Modules\User\Entities;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Comment\Entities\Comment;
use Modules\Photo\Entities\Photo;
use Modules\Post\Entities\Post;
use Modules\Realtime\Entities\Friend;
use Modules\Realtime\Entities\Message;
use Modules\Trip\Entities\Trip;
use Modules\Video\Entities\Video;

class User extends Authenticatable {

	use Notifiable;

	protected $fillable = ['full_name', 'email', 'password', 'image', 'status', 'country', 'state', 'phone', 'use_free_trial'];

	protected $hidden = ['remeber_token', 'password'];

	public function getImageAttribute($image) {
		return 'upload/users/' . $image;
	}

	public function trips() {
		return $this->hasMany(Trip::class);
	}

	public function followers() {
		return $this->hasMany(Follow::class, 'reciever_id');
	}



	public function photos() {
		return $this->hasMany(Photo::class);
	}

	public function videos() {
		return $this->hasMany(Video::class);
	}

	public function comments() {
		return $this->hasMany(Comment::class);
	}

	public function posts() {


        return $this->hasMany(Post::class);
    }



	public function last_message_info() {
		return Message::where('sender_id', $this->id)
			->orWhere('reciever_id', $this->id)
			->orderBy('created_at', 'desc')
			->first();
	}

	public function friends() {

		$friends = Friend::where('reciever_id', auth()->id())->orWhere('sender_id', auth()->id())->get();

		return $friends;
	}

	public static function createResetPassword($data, $token) {
		DB::table('password_resets')->insert([
			'email' => $data['email'],
			'token' => $token,
			'created_at' => Carbon::now(),
		]);
	}

	public static function getResetPasswordByToken($token) {
		return DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
	}

	public static function deleteResetPassword($token) {
		DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->delete();
	}

	public static function updatePassword($reset_password) {
		User::where('email', $reset_password->email)->update(['password' => bcrypt(request('password'))]);
	}


}
