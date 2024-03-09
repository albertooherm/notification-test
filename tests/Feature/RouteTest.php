<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_home_route(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_create_notification_route(): void
    {
        $response = $this->get('/notifications/create');
        $response->assertStatus(200);
    }

    public function test_logs_notification_route(): void
    {
        $response = $this->get('/notifications/logs');
        $response->assertStatus(200);
    }
}
