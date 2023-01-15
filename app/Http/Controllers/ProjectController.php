<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function show(Request $request, $id) {
        return view('pages.Project.show');
    }
    public function create() {
        return view('pages.Project.create');
    }
    public function store() {

    }
    public function edit(Request $request, $id) {
        if(Auth::user()->id != $id) {
            print('you are not the owner of this project');
        }
        return view('pages.Project.edit');
    }
    public function update(Request $request, $id) {
        if(Auth::user()->id != $id) {
            print('you are not the owner of this project');
        }
    }
    public function destroy(Request $request, $id) {

    }
}
