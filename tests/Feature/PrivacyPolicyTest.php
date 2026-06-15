<?php

declare(strict_types=1);

test('privacy policy screen can be rendered', function (): void {
    $response = $this->get('/privacy-policy');

    $response->assertStatus(200);
});
