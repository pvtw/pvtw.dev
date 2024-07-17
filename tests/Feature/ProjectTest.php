<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class ProjectTest extends TestCase
{
    public function test_projects_screen_can_be_rendered(): void
    {
        $response = $this->get('/projects');

        $response->assertStatus(200);
    }
}
