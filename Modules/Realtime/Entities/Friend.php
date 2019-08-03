<?php

namespace Modules\Realtime\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Friend extends Model {
	protected $fillable = [
		'reciever_id',
		'sender_id',
	];

	public function reciever() {
		return $this->belongsTo(User::class, 'reciever_id', 'id');
	}

	public function sender() {
		return $this->belongsTo(User::class, 'sender_id', 'id');
	}

}
