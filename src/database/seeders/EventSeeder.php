<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::factory()->create([
            'title' => '開発会議',
            'start_time' => '2025-03-01 10:00:00',
            'end_time' => '2025-03-01 12:00:00',
            'location' => '会議室A',
            'group_id' => 1,
            'detail' => '新機能の開発について',
            'register_user_id' => 1,
        ]);

        Event::factory()->create([
            'title' => '営業報告会',
            'start_time' => '2025-03-02 14:00:00',
            'end_time' => '2025-03-02 16:00:00',
            'location' => '会議室B',
            'group_id' => 2,
            'detail' => '月次営業報告',
            'register_user_id' => 2,
        ]);

        Event::factory()->create([
            'title' => '採用面接',
            'start_time' => '2025-03-03 13:00:00',
            'end_time' => '2025-03-03 17:00:00',
            'location' => '面接室1',
            'group_id' => 3,
            'detail' => '新卒採用面接',
            'register_user_id' => 3,
        ]);

        Event::factory(5)->create();
    }
}
