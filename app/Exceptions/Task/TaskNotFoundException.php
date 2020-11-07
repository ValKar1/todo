<?php

namespace App\Exceptions\Task;

use Exception;

class TaskNotFoundException extends Exception
{
	/**
	 * Render the exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request
	 * @return \Illuminate\Http\Response
	 */
	public function render()
	{
		$code = 404;
		return response()->json(
			[
				'message' => 'TaskNotFoundException',
				'code' => $code
			],
			$code
		);
	}
}
