<?php

namespace Tests\Unit\Notifications;

use Tests\TestCase;
use App\Notifications\MovieNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MovieNotificationTest extends TestCase
{
    public function testViaMethod(): void
    {
        $notification = new MovieNotification();
        $via = $notification->via(new \stdClass());

        $this->assertIsArray($via);
        $this->assertContains('mail', $via);
    }

    public function testToMailMethod(): void
    {
        $notification = new MovieNotification();
        $mailMessage = $notification->toMail(new \stdClass());

        $this->assertInstanceOf(MailMessage::class, $mailMessage);
        $this->assertEquals('The introduction to the notification.', $mailMessage->introLines[0]);
        $this->assertEquals('Notification Action', $mailMessage->actionText);
        $this->assertEquals(url('/'), $mailMessage->actionUrl);
        $this->assertEquals('Thank you for using our application!', $mailMessage->outroLines[0]);
    }

    public function testToArrayMethod(): void
    {
        $notification = new MovieNotification();
        $toArray = $notification->toArray(new \stdClass());

        $this->assertIsArray($toArray);
        $this->assertEmpty($toArray);
    }
}
