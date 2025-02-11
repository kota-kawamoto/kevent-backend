<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->insert([
            [
                'group_name' => 'システム開発部',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => '営業部',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => '経営戦略室',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
