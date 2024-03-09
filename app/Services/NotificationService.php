<?php

namespace App\Services;

use App\Models\User;
use App\Models\NotificationLog;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function sendNotificationToSubscribers($category, $message)
    {
        $subscribers = $this->getSubscribersByCategory($category);

        foreach ($subscribers as $user) {
            foreach ($user->notification_channels as $channel) {
                $this->sendNotification($user, $channel, $message);
            }
        }
    }

    protected function getSubscribersByCategory($category)
    {
        return User::whereJsonContains('subscribed_categories', $category)->get();
    }

    protected function sendNotification(User $user, $channel, $message)
    {
        Log::info("Sending {$channel} notification to {$user->name}: {$message}");

        NotificationLog::create([
            'user_id' => $user->id,
            'type' => $channel,
            'message' => $message,
            'notification_channel' => $channel,
            'sent_at' => now(),
        ]);
    }
}
