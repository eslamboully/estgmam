<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateFormRequest extends FormRequest {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$rules = [
			'desc' => 'required|min:3',
			'image' => 'sometimes|nullable|image',
			'user_id' => 'required|exists:users,id',
            'status'=>'required',
            'plan_id' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
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
