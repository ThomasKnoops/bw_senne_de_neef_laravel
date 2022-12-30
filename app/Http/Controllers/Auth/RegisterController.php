<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(Request $request) {
        return view('pages.Auth.Register.show');
    }

    public function store(Request $request) {

    }
}
