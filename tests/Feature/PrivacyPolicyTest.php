<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class PrivacyPolicyTest extends TestCase
{
    public function test_privacy_policy_screen_can_be_rendered(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
    }
}
