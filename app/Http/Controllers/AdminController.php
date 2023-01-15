<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request) {
        if(Auth::user()->isAdmin()) {
            $categories = FaqCategory::all();
            return view("pages.Admin.index", compact('categories'));
        }
        abort(403, "This route is only for admins");
    }
}
