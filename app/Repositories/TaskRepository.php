<?php

namespace App\Repositories;

use App\Models\Task;
use App\Exceptions\Task\TaskNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskRepository extends BaseRepository
{
    /**
     * @var \App\Models\Task
     */
    protected $model;

    /**
     * TaskRepository constructor.
     *
     * @param \App\Models\Task $model
     */
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
    
    /**
     * createTask
     *
     * @param  mixed $data
     * @return \App\Models\Task
     */
    public function createTask(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Get all tasks by given userId
     *
     * @param  mixed $userId
     * @return \App\Models\Task
     */
    public function getTasksByUserId(int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->get();
    }
    
    /**
     * Get task by given id and userId
     *
     * @param  mixed $id
     * @param  mixed $data
	 * @return \App\Models\Task
	 * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getTaskByIdAndUserId(int $id, int $userId)
    {
        try {
			$task = $this->model
                ->where('id', $id)
                ->where('user_id', $userId)
				->firstOrFail();
		} catch(ModelNotFoundException $e) {
			throw new TaskNotFoundException();
        }
		return $task;
    }
    
    /**
     * Delete task by given id and userId
     *
     * @param  mixed $id
     * @param  mixed $userId
	 * @return \App\Models\Task
	 * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function deleteTaskByTaskIdAndUserId(int $id, int $userId)
    {
        $task = $this->getTaskByIdAndUserId($id, $userId);
        $task->delete();
        return $task;
    }
    
    /**
     * Update task by given id and userId
     *
     * @param  mixed $id
     * @param  mixed $userId
     * @param  mixed $data
  	 * @return \App\Models\Task
	 * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function updateTaskByIdAndUserId(int $id, int $userId, array $data)
    {
        $task = $this->getTaskByIdAndUserId($id, $userId);
        $task->update($data);
        return $task;
    }
}
