<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Common\Services\LocalFiles;
use Modules\Post\Http\Requests\AlbumStoreFormRequest;
use Modules\Post\Repositories\PostAlbumRepository;
use Modules\Post\Repositories\PostRepository;
use Modules\Post\Entities\PostImage;

class PostAlbumsController extends Controller {
	use LocalFiles;
    public $postRepository;
    public $postAlbumRepository;
	public function __construct(PostAlbumRepository $postAlbumRepository, PostRepository $postRepository) {
		$this->postAlbumRepository = $postAlbumRepository;
		$this->postRepository = $postRepository;

	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create($id) {

		$post = $this->postRepository->findOrFail($id);

		$title = trans('adminpanel::adminpanel.add_new');

		return view('post::albums.create', compact('title', 'post'))->with('success', session('success'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Response
	 */
	public function store(AlbumStoreFormRequest $request) {

		$data = $request->validated();

		$imageData = $this->storeFile('image', 'posts/posts/albums', true);

		$data = array_merge($data, $imageData);

		$data = array_filter($data);

		return $this->postAlbumRepository->create($data)->id;

	}

	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Response
	 */
	public function destroy() {
		$id = request('id');

		$this->postAlbumRepository->destroy($id);

	}
}
