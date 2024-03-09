<?php

namespace Tests\Unit\Notifications;

use Tests\TestCase;
use App\Notifications\FinanceNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class FinanceNotificationTest extends TestCase
{
    /**
     * Test the via method of FinanceNotification.
     */
    public function testViaMethod(): void
    {
        $notification = new FinanceNotification();
        $via = $notification->via(new \stdClass());

        $this->assertIsArray($via);
        $this->assertContains('mail', $via);
    }

    /**
     * Test the toMail method of FinanceNotification.
     */
    public function testToMailMethod(): void
    {
        $notification = new FinanceNotification();
        $mailMessage = $notification->toMail(new \stdClass());

        $this->assertInstanceOf(MailMessage::class, $mailMessage);
        $this->assertEquals('The introduction to the notification.', $mailMessage->introLines[0]);
        $this->assertEquals('Notification Action', $mailMessage->actionText);
        $this->assertEquals(url('/'), $mailMessage->actionUrl);
        $this->assertEquals('Thank you for using our application!', $mailMessage->outroLines[0]);
    }

    /**
     * Test the toArray method of FinanceNotification.
     */
    public function testToArrayMethod(): void
    {
        $notification = new FinanceNotification();
        $toArray = $notification->toArray(new \stdClass());

        $this->assertIsArray($toArray);
        $this->assertEmpty($toArray);
    }
}
