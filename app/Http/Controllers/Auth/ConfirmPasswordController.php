<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ConfirmPasswordRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class ConfirmPasswordController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(ConfirmPasswordRequest $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->user()->email,
            ...$request->validated(),
        ];

        if ( ! Auth::guard('web')->validate($credentials)) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home', absolute: false));
    }
}
