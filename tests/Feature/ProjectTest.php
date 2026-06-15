<?php

declare(strict_types=1);

test('projects screen can be rendered', function (): void {
    $response = $this->get('/projects');

    $response->assertStatus(200);
});
