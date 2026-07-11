<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('privacy policy screen can be rendered', function (): void {
    $response = get('/privacy-policy');

    $response->assertStatus(200);
});
