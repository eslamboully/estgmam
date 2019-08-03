<?php

namespace Modules\Video\Http\Controllers;

use App\DataTables\VideoDatatable;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Common\Services\LocalFiles;
use Modules\Video\Http\Requests\VideoStoreFormRequest;
use Modules\Video\Http\Requests\VideoUpdateFormRequest;
use Modules\Video\Repositories\VideoRepository;

class VideosController extends Controller {
	use LocalFiles;

	public function __construct(VideoRepository $videoRepository) {
		$this->videoRepository = $videoRepository;
	}

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(VideoDatatable $videoDatatable) {
		$title = trans('video::video.videos');
		return $videoDatatable->render('video::index', compact('title'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		$title = trans('adminpanel::adminpanel.add_new');

		return view('video::create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Response
	 */
	public function store(VideoStoreFormRequest $request) {
		$data = $request->validated();

		$data['image'] = $this->storeFile('image', 'videos');
		$data = array_filter($data);

		$video = $this->videoRepository->create($data);

		return redirect()->route('videos.index')->with('success', trans('adminpanel::adminpanel.created'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param int $id
	 * @return Response
	 */
	public function edit($id) {
		$title = trans('adminpanel::adminpanel.edit');
		$video = $this->videoRepository->find($id);

		return view('video::edit', compact('video', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(VideoUpdateFormRequest $request, $id) {

		$video = $this->videoRepository->find($id);
		$data = $request->validated();

		$data['image'] = $this->storeFile('image', 'videos');
		$data = array_filter($data);

		$video->update($data);

		return redirect()->route('videos.index')->with('success', trans('adminpanel::adminpanel.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id) {
		$video = $this->videoRepository->findOrFail($id);

		$this->videoRepository->destroy($id);
		$this->deleteFile($video->image);

		return back()->with('success', trans('adminpanel::adminpanel.deleted'));
	}
}
