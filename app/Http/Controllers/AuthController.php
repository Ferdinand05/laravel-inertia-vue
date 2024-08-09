<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {

        dd($request->remember);
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only(['email', 'password']), $request->remember)) {
            return to_route('pages.index');
        }

        throw ValidationValidationException::withMessages([
            'email' => 'Your credentials does not match with our records'
        ]);
    }
}
