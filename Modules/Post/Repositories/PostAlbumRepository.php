<?php

namespace Modules\Post\Repositories;

use App\Repositories\BaseRepository;
use File;
use Modules\Common\Services\LocalFiles;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostImage;

class PostAlbumRepository extends BaseRepository {
	use LocalFiles;

	function __construct(PostImage $model) {
		$this->model = $model;
	}

	public function delete($post) {
		# Delete Photo Albums from /Images/posts.
		if ($post->photos->all()) {
			$file_path = [];
			foreach ($post->photos->all() as $photo) {
				$file_path[] = public_path() . '/images/posts/' . $photo->photo;
			}

			File::delete($file_path);
		}
	}

	public function deletePic($id) {
		$pic = PostImage::where('id', $id)->first();
		$file_path = public_path() . '/images/posts/' . $pic->photo;
		File::delete($file_path);

		return PostImage::destroy($pic->id);
	}
}
