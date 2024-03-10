<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\NotificationLog;
use App\Services\NotificationService;
use Mockery;

class NotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_the_notification_form_with_logs()
    {
        NotificationLog::factory()->count(5)->create();

        $response = $this->get('/notifications');

        $response->assertStatus(200);
        $response->assertViewIs('notifications.index');
        $response->assertViewHas('logs');
    }

    /** @test */
    public function it_requires_category_and_message_to_send_notification()
    {
        $response = $this->post('/notification/send', []);
        $response->assertSessionHasErrors(['category', 'message']);
    }

    /** @test */
    public function it_sends_notification_given_valid_data()
    {
        $this->withoutExceptionHandling();
        $mock = Mockery::mock(NotificationService::class);
        $mock->shouldReceive('sendNotificationToSubscribers')->once()->andReturn(true);
        $this->app->instance(NotificationService::class, $mock);

        $response = $this->post('/notification/send', [
            'category' => 'Sports',
            'message' => 'Test Message',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Notifications sent successfully!');
    }
}
