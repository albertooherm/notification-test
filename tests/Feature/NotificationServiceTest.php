<?php

namespace Tests\Feature;

use App\Services\NotificationService;
use App\Notifications\SportNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationServiceTest extends TestCase
{

    public function testSendNotificationForSports(): void
    {
        $notificationService = new NotificationService();
        $data = ['category' => 'Sports'];

        $result = $notificationService->sendNotification($data);
        $this->assertInstanceOf(SportNotification::class, $result);
    }

    public function testSendNotificationForInvalidCategory(): void
    {
        $notificationService = new NotificationService();
        $data = ['category' => 'InvalidCategory'];
        $result = $notificationService->sendNotification($data);
        $this->assertNull($result);
    }

}
