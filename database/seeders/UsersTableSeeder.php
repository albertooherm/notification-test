<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->boolean ? now() : null,
                'password' => Hash::make('password'),
                'phone_number' => $faker->phoneNumber,
                'subscribed_categories' => json_encode($faker->randomElements(['Sports', 'Finance', 'Movies'], 2)),
                'notification_channels' => json_encode($faker->randomElements(['SMS', 'Email', 'Push'], 2)),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
