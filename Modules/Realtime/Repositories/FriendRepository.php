<?php

namespace Modules\Realtime\Repositories;

use App\Repositories\BaseRepository;
use Modules\Realtime\Entities\Friend;

class FriendRepository extends BaseRepository {
	function __construct(Friend $model) {
		$this->model = $model;
	}

	public function update($id, $data) {
		$model = $this->model->findOrFail($id);

		return $model->update($data);
	}

}