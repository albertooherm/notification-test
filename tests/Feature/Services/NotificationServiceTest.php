<?php

namespace Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\NotificationService;
use App\Models\User;
use App\Models\NotificationLog;
use Illuminate\Support\Facades\Log;

class NotificationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $notificationService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notificationService = new NotificationService();
        Log::spy();
    }

    /** @test */
    public function it_sends_notifications_to_subscribers()
    {
        $user = User::factory()->create([
            'notification_channels' => ['channels' => ['E-Mail']],
            'subscribed_categories' => ['categories' => ['Sports']],
        ]);

        $category = 'Sports';
        $message = 'Test message';

        $result = $this->notificationService->sendNotificationToSubscribers($category, $message);

        $this->assertTrue($result);
        $this->assertDatabaseHas('notification_logs', [
            'user_id' => $user->id,
            'category' => $category,
            'message' => $message,
        ]);

        Log::shouldHaveReceived('info')->with("Notification sent to user {$user->id} via E-Mail.");
    }

    /** @test */
    public function it_returns_false_if_no_subscribers_found()
    {
        $category = 'NonExistingCategory';
        $message = 'Test message';

        $result = $this->notificationService->sendNotificationToSubscribers($category, $message);

        $this->assertFalse($result);
        Log::shouldHaveReceived('info')->with("No subscribers found for category: {$category}.");
    }
}
