<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model {
	protected $fillable = ['reciever_id', 'sender_id'];

	public function sender() {
		return $this->belongsTo(User::class, 'sender_id');
	}

	public function reciever() {
		return $this->belongsTo(User::class, 'reciever_id');
	}

}
