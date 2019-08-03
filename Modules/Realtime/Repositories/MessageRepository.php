<?php

namespace Modules\Realtime\Repositories;

use App\Repositories\BaseRepository;
use Modules\Realtime\Entities\Message;

class MessageRepository extends BaseRepository {
	function __construct(Message $model) {
		$this->model = $model;
	}

}