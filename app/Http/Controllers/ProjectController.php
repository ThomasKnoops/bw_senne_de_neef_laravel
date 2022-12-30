<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
        return view('pages.Project.edit');
    }
    public function update(Request $request, $id) {

    }
    public function destroy(Request $request, $id) {

    }
}
