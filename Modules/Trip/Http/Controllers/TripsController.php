<?php

namespace Modules\Trip\Http\Controllers;

use App\DataTables\TripDatatable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Common\Services\LocalFiles;
use Modules\Trip\Entities\Trip;
use Modules\Trip\Http\Requests\TripStoreFormRequest;
use Modules\Trip\Http\Requests\TripUpdateFormRequest;
use Modules\Trip\Jobs\SendTripToFollowers;
use Modules\Trip\Repositories\DestinationRepository;
use Modules\Trip\Repositories\TripAlbumRepository;
use Modules\Trip\Repositories\TripCategoryRepository;
use Modules\Trip\Repositories\TripRepository;

class TripsController extends Controller {
	use LocalFiles;

	public function __construct(DestinationRepository $destinationRepository, TripRepository $tripRepository, TripAlbumRepository $tripPicRepository, TripCategoryRepository $tripCategRepository) {
		$this->tripRepository = $tripRepository;
		$this->tripCategRepository = $tripCategRepository;
		$this->tripPicRepository = $tripPicRepository;
		$this->destinationRepository = $destinationRepository;
	}

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(TripDatatable $tripDatatable) {

		$title = trans('trip::trip.trips');
		return $tripDatatable->render('trip::trips.index', compact('title'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		$title = trans('adminpanel::adminpanel.add_new');
		$categories = $this->tripCategRepository->all();
		$destinations = $this->destinationRepository->all();

		return view('trip::trips.create', compact('title', 'categories', 'destinations'));
	}

	/**
	 * Show specified resource.
	 *
	 * @param int $id
	 *
	 * @return response
	 */
	public function show($id) {
		$trip = $this->tripRepo->find($id);

		return view('trip::Trip.show', ['trip' => $trip]);
	}

	public function ajax_edit(Request $request) {
		$trip = Trip::find($request->id);
		if ($trip->status == 'active') {
			$trip->update(['status' => 'pending']);
		} else {
			$trip->update(['status' => 'active']);
		}
		return $trip;
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function store(TripStoreFormRequest $request) {

		$data = $request->validated();

		$data['left_side_boat_image'] = $this->storeFile('left_side_boat_image', 'trips/trips');
		$data['right_side_boat_image'] = $this->storeFile('right_side_boat_image', 'trips/trips');
		$data['der_license_image'] = $this->storeFile('der_license_image', 'trips/trips');
		$data['boat_license_image'] = $this->storeFile('boat_license_image', 'trips/trips');
		if (!in_array('started_at', $data)) {
			$data['started_at'] = Carbon::now();
		}
		if (!in_array('ended_at', $data)) {
			$data['ended_at'] = Carbon::now()->addDays(3);
		}
		$data = array_filter($data);

		if (!request('user_id')) {
			$data['user_id'] = auth()->user()->id;

		}

		$trip = $this->tripRepository->create($data);

		$followers = auth('web')->user()->followers;
		$user = auth('web')->user();

		SendTripToFollowers::dispatch($user, $followers)->delay(now()->addSeconds(10));

		$this->tripRepository->addCategories($trip, $data['categories']);

		if (!request('user_id')) {
			return redirect()->route('front_index')->with('success', trans('front::front.added_trip_successfully'));
		}

		return redirect()->back()->with('success', trans('front::front.added_trip_successfully'));

	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit($id) {
		$trip = $this->tripRepository->find($id);

		$categories = $this->tripCategRepository->all();
		$destinations = $this->destinationRepository->all();

		$title = trans('adminpanel::adminpanel.edit');

		return view('trip::trips.edit', compact('trip', 'title', 'categories', 'destinations'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  Request $request
	 * @return Response
	 */
	public function update(TripUpdateFormRequest $request, $id) {
		$data = $request->validated();

		$trip = $this->tripRepository->find($id);

		$data['left_side_boat_image'] = $this->deleteAndStoreNewFile($trip->left_side_boat_image, 'left_side_boat_image', 'trips/trips');
		$data['right_side_boat_image'] = $this->deleteAndStoreNewFile($trip->right_side_boat_image, 'right_side_boat_image', 'trips/trips');
		$data['der_license_image'] = $this->deleteAndStoreNewFile($trip->der_license_image, 'der_license_image', 'trips/trips');
		$data['boat_license_image'] = $this->deleteAndStoreNewFile($trip->boat_license_image, 'boat_license_image', 'trips/trips');

		$data = array_filter($data);

		$this->tripRepository->update($trip, $data);

		$this->tripRepository->updateCategories($trip, $data['categories']);

		return redirect()->route('trips.index')->with('success', trans('adminpanel::adminpanel.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy($id) {
		$trip = $this->tripRepository->find($id);

		$this->tripRepository->destroy($id);

		$this->deleteFile($trip->image);

		return back()->with('success', trans('adminpanel::adminpanel.deleted'));
	}

}
