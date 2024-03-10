<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'subscribed_categories' => ['categories' => ['Sports', 'Finance', 'Movies']],
            'notification_channels' => ['channels' => ['E-Mail', 'SMS', 'Push Notification']],
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
