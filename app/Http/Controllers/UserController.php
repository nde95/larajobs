<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // register user form
    public function create()
    {
        return view('users.register');
    }

    // create/store new user
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // hash password
        $formData['password'] = Hash::make($formData['password']);

        $user = User::create($formData);

        auth()->login($user);
        return redirect('/')->with('message', 'Account created successfully!');
    }

    // login user form
    public function login()
    {
        return view('users.login');
    }

    // log user out
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Logged out successfully!');
    }

    // log user in
    public function authenticate(Request $request)
    {
        $formData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formData)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
