<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('projects screen can be rendered', function (): void {
    $response = get('/projects');

    $response->assertStatus(200);
});
