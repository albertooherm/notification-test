<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsLogTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = range(1, 10);
        $categories = ['Sports', 'Finance', 'Movies'];
        $notificationTypes = ['SMS', 'Email', 'Push'];

        foreach ($userIds as $userId) {
            foreach ($categories as $category) {
                foreach ($notificationTypes as $notificationType) {
                    DB::table('notifications_log')->insert([
                        'user_id' => $userId,
                        'category' => $category,
                        'notification_type' => $notificationType,
                        'message' => "Example message for $category category via $notificationType.",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
