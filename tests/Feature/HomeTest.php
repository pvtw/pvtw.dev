<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class HomeTest extends TestCase
{
    public function test_home_screen_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
