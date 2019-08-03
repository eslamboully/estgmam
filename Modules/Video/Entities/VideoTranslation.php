<?php

namespace Modules\Video\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoTranslation extends Model {

	public $timestamps = false;
	protected $fillable = ['title', 'desc'];

}
