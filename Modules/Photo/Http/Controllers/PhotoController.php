<?php

namespace Modules\Photo\Http\Controllers;

use App\DataTables\PhotoDatatable;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Common\Services\LocalFiles;
use Modules\Photo\Entities\Photo;
use Modules\Photo\Http\Requests\PhotoStoreFormRequest;
use Modules\Photo\Http\Requests\PhotoUpdateFormRequest;

class PhotoController extends Controller {
	use LocalFiles;
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(PhotoDatatable $photoDatatable) {
		$title = trans('photo::photo.photos');
		return $photoDatatable->render('photo::index', compact('title'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		$title = trans('adminpanel::adminpanel.add_new');

		return view('photo::create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Response
	 */
	public function store(PhotoStoreFormRequest $request) {
		$data = $request->validated();

		$data['image'] = $this->storeFile('image', 'photos');
		$data = array_filter($data);

		$photo = Photo::create($data);

		return redirect()->route('photos.index')->with('success', trans('adminpanel::adminpanel.created'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param int $id
	 * @return Response
	 */
	public function edit($id) {
		$title = trans('adminpanel::adminpanel.edit');
		$photo = Photo::find($id);

		return view('photo::edit', compact('photo', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(PhotoUpdateFormRequest $request, $id) {

		$photo = Photo::find($id);
		$data = $request->validated();

		$data['image'] = $this->storeFile('image', 'photos');
		$data = array_filter($data);

		$photo->update($data);

		return redirect()->route('photos.index')->with('success', trans('adminpanel::adminpanel.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id) {
		$photo = Photo::find($id);
		$photo->destroy($photo->id);
		$this->deleteFile($photo->image);

		return back()->with('success', trans('adminpanel::adminpanel.deleted'));
	}
}
