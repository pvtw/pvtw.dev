<?php

declare(strict_types=1);

return [
    'user_keys' => [
        ...array_filter(
            explode(',', (string) env('ADMIN_USER_KEYS', ''))
        ),
    ],
];
