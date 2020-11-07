<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\AuthRequest;

class DeleteTaskRequest extends AuthRequest
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
			'id' => 'required|integer',
		];
	}

	/**
	 * Inject GET parameters into validation data
	 *
	 * @param null $keys
	 * @return array
	 */
	public function all($keys = null)
	{
		$data       = parent::all($keys);
		$data['id'] = $this->route('id');
		return $data;
	}
}
