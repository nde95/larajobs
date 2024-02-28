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
}
