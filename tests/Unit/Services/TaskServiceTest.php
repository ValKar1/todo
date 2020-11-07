<?php

namespace Tests\Unit\Services;

use Mockery;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use App\Repositories\TaskRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskServiceTest extends TestCase
{
    private $taskRepo;

    public function setUp(): void
    {
        parent::setUp();

        $this->taskRepo = Mockery::mock(TaskRepository::class);

        $this->taskService = new TaskService($this->taskRepo);
    }

    public function testCreateUserTask_SuccessfullyCreated()
    {
        $user = factory(User::class)->make();
        $task = factory(Task::class)->make([
            'user_id' => $user->id
        ]);

        $data = [
            'user_id' => $task->voices,
            'status' => $task->status,
            'name' => $task->name,
            'description' => $task->description
        ];

        $this->taskRepo->shouldReceive('createTask')
            ->once()
            ->with([
                'user_id' => $task->user_id,
                'status' => $task->status,
                'name' => $task->name,
                'description' => $task->description
            ])
            ->andReturn($task);

        unset($data['user_id']);

        $result = $this->taskService->createUserTask($user->id, $data);
        $this->assertEquals($task, $result);
    }

    public function testUpdateUserTask_SuccessfullyUpdated()
    {
        $user = factory(User::class)->make();
        $task = factory(Task::class)->make([
            'user_id' => $user->id
        ]);

        $data = [
            'id' => $task->id,
            'status' => $task->status,
            'name' => $task->name,
            'description' => $task->description
        ];

        $this->taskRepo->shouldReceive('updateTaskByIdAndUserId')
            ->once()
            ->with($task->id, $user->id, [
                'status' => $task->status,
                'name' => $task->name,
                'description' => $task->description
            ])
            ->andReturn($task);

        $result = $this->taskService->updateUserTask($user->id, $data);
        $this->assertEquals($task, $result);
    }

    public function testDeleteUserTask_SuccessfullyDeleted()
    {
        $user = factory(User::class)->make();
        $task = factory(Task::class)->make([
            'user_id' => $user->id
        ]);

        $this->taskRepo->shouldReceive('deleteTaskByTaskIdAndUserId')
            ->once()
            ->with($task->id, $user->id)
            ->andReturn(true);

        $result = $this->taskService->deleteUserTask($user->id, $task->id);
        $this->assertEquals(true, $result);
    }

    public function testGetUserTasks_SuccessfullyGotTasks()
    {
        $user = factory(User::class)->make();
        $task = factory(Task::class)->make([
            'user_id' => $user->id
        ]);

        $this->taskRepo->shouldReceive('getTasksByUserId')
            ->once()
            ->with($user->id)
            ->andReturn($task);

        $result = $this->taskService->getUserTasks($user->id);
        $this->assertEquals($task, $result);
    }
}
