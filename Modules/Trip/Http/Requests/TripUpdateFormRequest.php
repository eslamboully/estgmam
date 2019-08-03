<?php

namespace Modules\Trip\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TripUpdateFormRequest extends FormRequest {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$rules = [

            'date' => 'required|date',
            'desc' => 'required|min:3',
            'trip_hour' => 'required',
            'hour' => 'required',
            'passengers' => 'required',
            'boat_number' => 'required',
            'boat_title' => 'required',
            'berth' => 'required',
            'day' => 'required',
            'started_at' => 'sometimes',
            'ended_at' => 'sometimes',
            'categories' => 'required|exists:trip_category,id',
            //'user_id' => 'required|exists:users,id',
            'price' => 'required|numeric|min:1|max:1000000',
            'passenger_price' => 'required|numeric|min:1|max:1000000',
		];

		return $rules;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}
}
