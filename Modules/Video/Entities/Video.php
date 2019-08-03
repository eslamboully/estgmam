<?php

namespace Modules\Video\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Video extends Model {
	protected $fillable = ['link','user_id'];

	use Translatable;

	protected $translatedAttributes = ['title', 'desc'];

	protected $translationModel = VideoTranslation::class;

    public function user()
    {
        return $this->belongsTo(User::class);
	}

}
