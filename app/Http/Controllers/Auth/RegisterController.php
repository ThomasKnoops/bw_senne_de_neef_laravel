<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(Request $request) {
        return view('pages.Auth.Register.show');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'birthdate'     => 'required',
        ]);

        $user = User::create([
            "username" => $validated['username'],
            "email" => $validated['email'],
            "password" => Hash::make($validated['password']),
            "first_name" => $validated['first_name'],
            "last_name" => $validated['last_name'],
            "birthdate" => $validated['birthdate']
        ]);

        Auth::login($user);

        return redirect(route('home'));
    }
}
