<?php

namespace Modules\Post\Repositories;

use App\Repositories\BaseRepository;
use Modules\Post\Entities\Post;

class PostRepository extends BaseRepository {
	private $postPhotos;
	public $model;

	public function __construct(Post $model) {
		$this->model = $model;
	}

	public function numbers($val) {
		preg_match('/[0-9.]+$/', $val, $match);

		return intval($match[0]);
	}

	public function update($post, $data) {

		return $post->update($data);
	}


}
