<?php

declare(strict_types=1);

return [
    'user_keys' => [
        ...array_filter(
            explode(',', env('ADMIN_USER_KEYS', ''))
        ),
    ],
];
