<?php

namespace Database\Factories;

use App\Models\NotificationLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NotificationLog>
 */
class NotificationLogFactory extends Factory
{
    protected $model = NotificationLog::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(['SMS', 'Email', 'Push']),
            'category' => $this->faker->randomElement(['Sports', 'Finance', 'Movies']),
            'message' => $this->faker->sentence,
            'notification_channel' => $this->faker->randomElement(['SMS', 'Email', 'Push']),
            'sent_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
