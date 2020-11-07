<?php

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Create random task seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = [1, 2];
        $statuses = [Task::OPEN, Task::DONE];

        for ($i = 0; $i < 10; $i++) {
            $task = new Task();
            $task->user_id = $userIds[array_rand($userIds, 1)];
            $task->status = $statuses[random_int(0, 1)];
            $task->name = "task " . $i;
            $task->description = "description" . $i;
            $task->save();
        }
    }
}
