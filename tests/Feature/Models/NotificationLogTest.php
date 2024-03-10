<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\NotificationLog;

class NotificationLogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_notification_log_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $notificationLog = NotificationLog::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $notificationLog->user);
        $this->assertEquals($user->id, $notificationLog->user->id);
    }
}
