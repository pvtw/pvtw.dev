<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class LoginController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.auth.login');
    }
}
