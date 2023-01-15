<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $news_items = News::latest()->paginate(15);
        return view('pages.Home.home', compact('news_items'));
    }
}
