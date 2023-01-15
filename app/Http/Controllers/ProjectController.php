<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function show(Request $request, $id) {
        $project = Project::findOrFail($id);
        return view('pages.Project.show', compact('project'));
    }
    public function create() {
        return view('pages.Project.create');
    }
    public function store(Request $request) {
        $user = Auth::user();

        $validated = $request->validate([
            'project_title'          => 'required|max:255',
            'project_content'        => 'required|max:472',
            'project_thumbnail'      => 'required|image|mimes:png|max:4096',
            'project_cover'          => 'required|image|mimes:png|max:4096',
        ]);

        $project = Project::create([
            "title" => $validated['project_title'],
            "content" => $validated['project_content'],
            "thumbnail" => 'default-thumbnail.png',
            "cover" => 'default-cover.png',
            "user_id" => $user->id
        ]);

        $thumbnailImageName = $project->id . '-thumbnail.png';
        $thumbnailFile = $validated['project_thumbnail'];
        $thumbnailImage = Image::make($thumbnailFile);
        $thumbnailImage = $thumbnailImage->resize(150, 150);
        $thumbnailImage->save('assets/project/'. $thumbnailImageName);


        $coverImageName = $project->id . '-cover.png';
        $coverFile = $validated['project_thumbnail'];
        $coverImage = Image::make($coverFile);
        $coverImage = $coverImage->resize(1600, 900);
        $coverImage->save('assets/project/'. $coverImageName);

        $project->thumbnail = $thumbnailImageName;
        $project->cover = $coverImageName;

        $project->save();

        return redirect()->route('project.show', $project->id);
    }
    public function edit(Request $request, $id) {
        $project = Project::findOrFail($id);
        if(Auth::user()->id != $project->user_id) {
            abort(403, 'Only admins are allowed to use this route'); //forbidden
        }
        return view('pages.Project.edit', compact('project'));
    }
    public function update(Request $request, $id) {
        $project = Project::findOrFail($id);
        if(Auth::user()->id != $project->user_id) {
            abort(403, 'Only admins are allowed to use this route'); //forbidden
        }

        $validated = $request->validate([
            'project_title'    => 'required|max:255',
            'project_content'     => 'required|max:255',
        ]);

        $project->title = $validated['project_title'];
        $project->content = $validated['project_content'];

        $project->save();

        return redirect()->route('project.show', $project->id);
    }

    public function update_thumbnail(Request $request, $id) {
        $project = Project::findOrFail($id);
        if(Auth::user()->id != $project->user_id) {
            abort(403, 'Only admins are allowed to use this route'); //forbidden
        }

        $validated = $request->validate([
            'project_thumbnail'    => 'required|image|mimes:png|max:4096',
        ]);


        $thumbnailImageName = $project->id . '-thumbnail.png';
        $thumbnailFile = $validated['project_thumbnail'];
        $thumbnailImage = Image::make($thumbnailFile);
        $thumbnailImage = $thumbnailImage->resize(150, 150);
        $thumbnailImage->save('assets/project/'. $thumbnailImageName);

        $project->thumbnail = $thumbnailImageName;

        $project->save();

        return redirect()->route('project.show', $project->id);
    }

    public function update_cover(Request $request, $id) {
        $project = Project::findOrFail($id);
        if(Auth::user()->id != $project->user_id) {
            abort(403, 'Only admins are allowed to use this route'); //forbidden
        }

        $validated = $request->validate([
            'project_cover'    => 'required|image|mimes:png|max:4096',
        ]);


        $coverImageName = $project->id . '-cover.png';
        $coverFile = $validated['project_thumbnail'];
        $coverImage = Image::make($coverFile);
        $coverImage = $coverImage->resize(1600, 900);
        $coverImage->save('assets/project/'. $coverImageName);


        $project->cover = $coverImageName;

        $project->save();

        return redirect()->route('project.show', $project->id);
    }

    public function destroy(Request $request, $id) {

    }
}
