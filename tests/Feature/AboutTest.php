<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('about screen can be rendered', function (): void {
    $response = get('/about-me');

    $response->assertStatus(200);
});
