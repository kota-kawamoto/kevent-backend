<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'login_id' => 'user1',
                'password' => Hash::make('password123'),
                'user_name' => '開発一郎',
                'type_id' => 1,
                'group_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login_id' => 'user2',
                'password' => Hash::make('password123'),
                'user_name' => '営業一郎',
                'type_id' => 2,
                'group_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login_id' => 'user3',
                'password' => Hash::make('password123'),
                'user_name' => '経営一郎',
                'type_id' => 2,
                'group_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
