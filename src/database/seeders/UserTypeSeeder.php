<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_types')->insert([
            [
                'type_name' => '管理者',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => '一般ユーザー',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
