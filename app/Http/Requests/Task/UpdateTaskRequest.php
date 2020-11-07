<?php

namespace App\Http\Requests\Task;

use App\Models\Task;
use Illuminate\Validation\Rule;
use App\Http\Requests\AuthRequest;

class UpdateTaskRequest extends AuthRequest
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
		//AuthenticationRequiredException
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id' => 'required|integer',
			'status' => [
				'required',
				Rule::in([Task::OPEN, Task::DONE]),
			],
			'name' => 'required|string|max:100',
			'description' => 'required|string'
		];
	}
}
