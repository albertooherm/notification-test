<?php

namespace App\Services;

use App\Models\User;
use App\Models\NotificationLog;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Envia notificaciones a suscriptores basado en la categoría.
     *
     * @param  mixed $category
     * @param  mixed $message
     * @return bool
     */
    public function sendNotificationToSubscribers($category, $message): bool
    {
        $subscribers = User::whereJsonContains('subscribed_categories', ['categories' => $category])->get();

        if ($subscribers->isEmpty()) {
            Log::info("No subscribers found for category: {$category}.");
            return false;
        }

        foreach ($subscribers as $user) {
            $channels = $user->notification_channels['channels'] ?? [];

            foreach ($channels as $channel) {
                if (!$this->sendNotification($user, $channel, $message, $category)) {
                    Log::error("Failed to send notification to user {$user->id} via {$channel}.");
                }
            }
        }

        return true;
    }

    /**
     * Crea un registro de notificación en la base de datos.
     *
     * @param  \App\Models\User $user
     * @param  string $channel
     * @param  string $message
     * @param  string $category
     * @return bool
     */
    protected function sendNotification($user, $channel, $message, $category): bool
    {
        try {
            $this->createNotificationLog($user, $channel, $message, $category);
            Log::info("Notification sent to user {$user->id} via {$channel}.");
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to send notification: {$e->getMessage()}");
            return false;
        }
    }

    /**
     * Crea un registro de notificación.
     *
     * @param \App\Models\User $user
     * @param string $channel
     * @param string $message
     * @param string $category
     */
    protected function createNotificationLog($user, $channel, $message, $category)
    {
        NotificationLog::create([
            'user_id' => $user->id,
            'category' => $category,
            'type' => $channel,
            'message' => $message,
            'notification_channel' => $channel,
            'sent_at' => now(),
        ]);
    }
}
