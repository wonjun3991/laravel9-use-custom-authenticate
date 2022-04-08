<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect(route('home'));
    }
}
