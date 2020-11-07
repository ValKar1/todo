<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{

	/**
	 * @var \App\Repositories\TaskRepository
	 */
	private $taskRepo;

	/**
	 * UserService constructor.
	 *
	 * @param \App\Repositories\TaskRepository $taskRepository
	 */
	public function __construct(TaskRepository $taskRepository)
	{
		$this->taskRepo = $taskRepository;
	}

	/**
	 * Get all tasks of curret user
	 *
	 * @param  mixed $userId
	 * @return mixed
	 */
	public function getUserTasks(int $userId)
	{
		return $this->taskRepo->getTasksByUserId($userId);
	}

	/**
	 * Update task of current user
	 *
	 * @param  mixed $userId
	 * @param  mixed $data
	 * @return \App\Models\Task
	 */
	public function updateUserTask(int $userId, array $data)
	{
		return $this->taskRepo->updateTaskByIdAndUserId($data['id'], $userId, [
			'status' => $data['status'],
			'name' => $data['name'],
			'description' =>  $data['description'],
		]);
	}

	/**
	 * Create task for current user
	 *
	 * @param  mixed $userId
	 * @param  mixed $data
	 * @return \App\Models\Task
	 */
	public function createUserTask(int $userId, array $data)
	{
		return $this->taskRepo->createTask([
			'user_id' => $userId,
			'status' => $data['status'],
			'name' => $data['name'],
			'description' =>  $data['description'],
		]);
	}

	/**
	 * Delete task of current user
	 *
	 * @param  mixed $userId
	 * @param  mixed $taskId
	 * @return \App\Models\Task
	 */
	public function deleteUserTask(int $userId, int $taskId)
	{
		return $this->taskRepo->deleteTaskByTaskIdAndUserId($taskId, $userId);
	}
}
