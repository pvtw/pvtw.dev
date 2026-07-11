<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('home screen can be rendered', function (): void {
    $response = get('/');

    $response->assertStatus(200);
});
