<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationLog;
use App\Models\User;

class NotificationLogsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            NotificationLog::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
