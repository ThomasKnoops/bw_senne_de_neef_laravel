<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show(Request $request, $id) {
        $user = User::where('id', $id)->firstOrFail();
        $projects = Project::where('user_id', $user->id)->paginate(10);

        return view('pages.Profile.show', compact('user', 'projects'));
    }

    public function all(Request $request) {
        $users = User::latest()->paginate(15);
        return view('pages.Profile.all', compact('users'));
    }

    public function index(Request $request) {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->latest()->paginate(5);
        return view('pages.Profile.index', compact('user', 'projects'));
    }

    public function edit(Request $request) {
        $user = Auth::user();
        return view('pages.Profile.edit', compact('user'));
    }
    public function update(Request $request) {
        $user = Auth::user();

        $validated = $request->validate([
            'profile_first_name'    => 'required|max:255',
            'profile_last_name'     => 'required|max:255',
            'profile_description' => 'required|max:255',
            'profile_biography' => 'required|max:472',
            'profile_birthdate' => 'required|date',
        ]);

        $user->first_name = $validated['profile_first_name'];
        $user->last_name = $validated['profile_last_name'];
        $user->short_description = $validated['profile_description'];
        $user->biography = $validated['profile_biography'];
        $user->birthdate = $validated['profile_birthdate'];

        $user->save();

        return redirect()->route('profile');
    }

    public function update_avatar(Request $request) {
        $user = Auth::user();

        $validated = $request->validate([
            'profile_avatar'      => 'required|image|mimes:png|max:4096',
        ]);

        $avatar= $validated['profile_avatar'];
        $imageNew = Image::make($avatar);
        $imageFinal = $imageNew->resize(150, 150);
        $imageFinal->save('assets/profile/'. $user->id . '-avatar.png');

        $user->avatar = $user->id . '-avatar.png';
        $user->save();
    }
}
