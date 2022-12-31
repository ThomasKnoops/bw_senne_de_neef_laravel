<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, $id) {
        $user = User::where('username', $id)->firstOrFail();
        $projects = Project::where('user_id', $user->id)->paginate(10);
        return view('pages.Profile.show', compact('user', 'projects'));
    }

    public function all(Request $request) {
        $users = User::latest()->paginate(15);
        return view('pages.Profile.all', compact('users'));
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
