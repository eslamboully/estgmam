<?php

namespace Modules\Trip\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Trip\Entities\Trip;

class TripCategory extends Model {
	use Translatable;

	public $translatedAttributes = ['desc', 'title'];

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */

	public function getImageAttribute($image) {
		return 'upload/trips/categories/' . $image;
	}

	protected $table = 'trip_category';

	protected $fillable = ['image', 'parent_id'];

	public function child() {
		return $this->hasMany(TripCategory::class, 'parent_id', 'id');
	}

	public function trips() {
		return $this->belongsToMany(Trip::class, 'trip_categories', 'category_id', 'trip_id');
	}

	public function parent() {
		return $this->belongsTo(TripCategory::class, 'parent_id', 'id');
	}
}
