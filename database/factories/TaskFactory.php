<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 9999),
        'name' => $faker->text($maxNbChars = 10),
        'status' => $faker->randomElement($array = [Task::OPEN, Task::DONE]),
        'description' => $faker->text($maxNbChars = 200), // password
        'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = '-5 minutes', $timezone = null)
    ];
});
