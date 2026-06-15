<?php

declare(strict_types=1);

test('home screen can be rendered', function (): void {
    $response = $this->get('/');

    $response->assertStatus(200);
});
