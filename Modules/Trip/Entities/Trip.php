<?php

namespace Modules\Trip\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Entities\Comment;
use Modules\User\Entities\User;

class Trip extends Model {

	public $fillable =
		[
		'date',
		'desc',
		'trip_hour',
		'hour',
		'passengers',
		'boat_number',
		'boat_title',
		'berth',
		'day',
		'price',
		'der_license_image',
		'boat_license_image',
		'right_side_boat_image',
		'left_side_boat_image',
		'passenger_price',
		'user_id',
		'status',
        'started_at',
        'ended_at',
	];

	public function getDerLicenseImageAttribute($image) {
		return 'upload/trips/trips/' . $image;
	}

	public function getBoatLicenseImageAttribute($image) {
		return 'upload/trips/trips/' . $image;
	}

	public function getRightSideBoatImageAttribute($image) {
		return 'upload/trips/trips/' . $image;
	}

	public function getLeftSideBoatImageAttribute($image) {
		return 'upload/trips/trips/' . $image;
	}

	# Relations.
	public function categories() {
		return $this->belongsToMany(TripCategory::class, 'trip_categories', 'trip_id', 'category_id');

	}

	public function album() {
		return $this->hasMany(TripImage::class);
	}

	public function program() {
		return $this->hasMany(TripProgram::class);
	}

	public function destinations() {
		return $this->belongsToMany(Destination::class, 'trip_destinations', 'trip_id', 'destination_id');
	}

	public function booking() {
		return $this->hasMany(Booking::class);
	}

	public function user(){
	    return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
