<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class AuthLayout extends Component
{
    public function render(): View|Closure|string
    {
        return view('layouts.auth');
    }
}
