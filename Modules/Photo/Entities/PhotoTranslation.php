<?php

namespace Modules\Photo\Entities;

use Illuminate\Database\Eloquent\Model;

class PhotoTranslation extends Model {
	public $timestamps = false;

	protected $fillable = ['title'];
}
