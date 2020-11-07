<?php

namespace App\Http\Requests;

class AuthRequest extends BaseRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @throws \App\Exceptions\AuthenticationRequiredException
	 */
	public function authorize()
	{
		if (!auth()->user()) {
			return redirect('/');
		}
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [];
	}
}
