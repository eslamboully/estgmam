<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Post extends Model {

	public $fillable =
		[
		'image',
		'desc',
		'user_id',
        'status',
        'plan_id',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'photo6',
         'started_at',
         'ended_at',
	];

	public function getImageAttribute($image) {
		return 'upload/posts/posts/' . $image;
	}

	# Relations.

	public function album() {
		return $this->hasMany(PostImage::class);
	}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

}
