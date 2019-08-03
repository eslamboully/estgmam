<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Post\Entities\Post;

class PostImage extends Model {
	protected $fillable = ['image', 'post_id', 'size', 'mime_type'];


	public function getImageAttribute($image) {
		return 'upload/posts/posts/albums/' . $image;
	}
	public function post() {
		return $this->belongsTo(Post::class);
	}
}
