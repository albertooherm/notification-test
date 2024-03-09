<?php

namespace Tests\Unit\Notifications;

use Tests\TestCase;
use App\Notifications\SportNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SportNotificationTest extends TestCase
{
    public function testViaMethod(): void
    {
        $notification = new SportNotification();
        $via = $notification->via(new \stdClass());

        $this->assertIsArray($via);
        $this->assertContains('mail', $via);
    }

    public function testToMailMethod(): void
    {
        $notification = new SportNotification();
        $mailMessage = $notification->toMail(new \stdClass());

        $this->assertInstanceOf(MailMessage::class, $mailMessage);
        $this->assertEquals('The introduction to the notification.', $mailMessage->introLines[0]);
        $this->assertEquals('Notification Action', $mailMessage->actionText);
        $this->assertEquals(url('/'), $mailMessage->actionUrl);
        $this->assertEquals('Thank you for using our application!', $mailMessage->outroLines[0]);
    }

    public function testToArrayMethod(): void
    {
        $notification = new SportNotification();
        $toArray = $notification->toArray(new \stdClass());

        $this->assertIsArray($toArray);
        $this->assertEmpty($toArray);
    }
}
