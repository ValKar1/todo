<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\Task\GetTasksRequest;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\DeleteTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;

class TaskController extends Controller
{    
    /**
     * TaskController constructor
     *
     * @param  mixed $taskService
     * @return void
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    
    /**
     * Get and display user tasks.
     * HTTP method: GET
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getTasks(GetTasksRequest $request)
    {
        $tasks = $this->taskService->getUserTasks($request->user()->id);

        return view('tasks')
            ->with([
                'tasks' => $tasks
            ]);
    }
    
    /**
     * Create new task.
     * HTTP method: POST
     *
     * @param  mixed $request
     * @return \App\Models\Task
     */
    public function createTask(CreateTaskRequest $request)
    {
        return $this->taskService->createUserTask($request->user()->id, $request->all());
    }
    
    /**
     * Update task.
     * HTTP method: PUT
     *
     * @param  mixed $request
     * @return \App\Models\Task
     */
    public function updateTask(UpdateTaskRequest $request)
    {
        return $this->taskService->updateUserTask($request->user()->id, $request->all());
    }
    
    /**
     * Delete task.
     * HTTP method: DELETE
     *
     * @param  mixed $request
     * @return \App\Models\Task
     */
    public function deleteTask(DeleteTaskRequest $request)
    {
        return $this->taskService->deleteUserTask($request->user()->id, $request->id);
    }
}
