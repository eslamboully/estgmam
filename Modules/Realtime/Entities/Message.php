<?php

namespace Modules\Realtime\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Message extends Model {
	protected $fillable = [

		'sender_id',
		'reciever_id',
		'content',
		'type',

	];

	protected $with = ['sender'];

	public function reciever() {
		return $this->belongsTo(User::class, 'reciever_id', 'id');
	}

	public function sender() {
		return $this->belongsTo(User::class, 'sender_id', 'id');
	}

}
