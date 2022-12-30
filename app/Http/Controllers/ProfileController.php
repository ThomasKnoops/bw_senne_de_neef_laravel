<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, $id) {
        return view('pages.Profile.show');
    }

    public function index(Request $request) {
        return view('pages.Profile.index');
    }

    public function edit(Request $request, $id) {
        return view('pages.Profile.edit');
    }
    public function update(Request $request, $id) {

    }
}
