<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\AuthRequest;

class GetTasksRequest extends AuthRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool|void
	 * @throws \App\Exceptions\AuthenticationRequiredException
	 */
	public function authorize()
	{
		parent::authorize();
		return true;
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
