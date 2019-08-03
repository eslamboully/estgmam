<?php

namespace Modules\Photo\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Photo extends Model {
	use Translatable;

	protected $guarded = [];

	protected $fillable = ['user_id','image'];

	public $translatedAttributes = ['title'];

	# Relations

	public function getImageAttribute($image) {
		return '/upload/photos/' . $image;
	}

    public function user()
    {
        return $this->belongsTo(User::class);
	}

}
