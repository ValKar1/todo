<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Create user seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = "test1";
        $user1->email = "test1@test.com";
        $user1->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user1->password = Hash::make('test1');
        $user1->save();

        $user2 = new User();
        $user2->name = "test2";
        $user2->email = "test2@test.com";
        $user2->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user2->password = Hash::make('test2');
        $user2->save();
    }
}
