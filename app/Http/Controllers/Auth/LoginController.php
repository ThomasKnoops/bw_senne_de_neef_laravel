<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(Request $request) {
        return view('pages.Auth.Login.show');
    }

    public function store(Request $request) {

    }

    public function destroy(Request $request) {

    }
}
