<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginFormRequest $request): RedirectResponse {
        if(!auth()->attempt($request->validated())) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Failed']);
        } 

        return redirect()->route('home');
    }

    public function logout(): RedirectResponse {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('home');
    }
}
