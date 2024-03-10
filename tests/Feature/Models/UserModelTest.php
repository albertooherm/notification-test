<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\NotificationLog;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_have_many_notification_logs()
    {
        $user = User::factory()->create();
        $notificationLog1 = NotificationLog::factory()->create(['user_id' => $user->id]);
        $notificationLog2 = NotificationLog::factory()->create(['user_id' => $user->id]);

        $this->assertCount(2, $user->notificationLogs);
        $this->assertTrue($user->notificationLogs->contains($notificationLog1));
        $this->assertTrue($user->notificationLogs->contains($notificationLog2));
    }
}
