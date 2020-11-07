<?php

namespace App\Http\Requests\Task;

use App\Models\Task;
use Illuminate\Validation\Rule;
use App\Http\Requests\AuthRequest;

class CreateTaskRequest extends AuthRequest
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

		return [
			'status' => [
				'required',
				Rule::in([Task::OPEN, Task::DONE]),
			],
			'name' => 'required|string|min:1|max:100',
			'description' => 'required|string|min:1'
		];
	}
}
