<?php

declare(strict_types=1);

test('about screen can be rendered', function (): void {
    $response = $this->get('/about-me');

    $response->assertStatus(200);
});
