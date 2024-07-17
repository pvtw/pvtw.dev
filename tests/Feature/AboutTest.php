<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class AboutTest extends TestCase
{
    public function test_about_screen_can_be_rendered(): void
    {
        $response = $this->get('/about-me');

        $response->assertStatus(200);
    }
}
