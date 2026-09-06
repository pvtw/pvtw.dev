<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Contracts\View\View;

final readonly class SettingsController
{
    public function __invoke(#[CurrentUser] User $user): View
    {
        return view('pages::settings', [
            'hasPassword' => null !== $user->password,
        ]);
    }
}
