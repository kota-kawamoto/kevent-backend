<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        $this->faker->locale('ja_JP');

        $startTime = Carbon::instance($this->faker->dateTimeBetween('now', '+1 month'));
        $endTime = $startTime->copy()->addHours(2);

        $eventTypes = ['オンライン会議', '研修', '面談', '報告会', 'MTG'];
        $locations = ['第1会議室', '外出先', '応接室', 'ルームA', 'ルームB'];

        return [
            'title' => $this->faker->randomElement(['月次', '特別', '臨時', '定例']) .
                      $this->faker->randomElement($eventTypes),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'location' => $this->faker->randomElement($locations),
            'group_id' => $this->faker->numberBetween(1, 3),
            'detail' => $this->faker->realText(50),
            'register_user_id' => $this->faker->numberBetween(1, 3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
