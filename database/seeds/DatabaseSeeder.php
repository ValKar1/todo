<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Create seeds for local instalation.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local') && User::count() == 0) {
            $this->call([
                UsersTableSeeder::class,
                TasksTableSeeder::class
            ]);
        }
    }
}
