<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function create(Request $request) {
        if(!Auth::user()->isAdmin()) {
            abort(403, "This route is meant for admins");
        }
        return view('pages.News.create');
    }
    public function store(Request $request) {
        if(!Auth::user()->isAdmin()) {
            abort(403, "This route is meant for admins");
        }

        $validated = $request->validate([
            'title'    => 'required|max:255',
            'content'     => 'required|max:255',
            'image'     => 'required|image|mimes:png|max:4096',
        ]);

        $news = News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => 'default.png'
        ]);

        $imageName = $news->id .'.png';
        $imageFile= $validated['image'];
        $imageNew = Image::make($imageFile);
        $imageFinal = $imageNew->resize(640, 360);
        $imageFinal->save('assets/news/'. $imageName);

        $news->image = $imageName;
        $news->save();

        return redirect()->route('home');
    }

    public function edit(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, "This route is meant for admins");
        }

        $news_item = News::findOrFail($id);

        return view('pages.News.edit', compact('news_item'));
    }

    public function update(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, "This route is meant for admins");
        }

        $validated = $request->validate([
            'title'    => 'required|max:255',
            'content'     => 'required|max:255'
        ]);


        $news = News::findOrFail($id);
        $news->title = $validated['title'];
        $news->content = $validated['content'];
        $news->save();

        return redirect()->route('home');
    }

    public function update_image(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, "This route is meant for admins");
        }
        $validated = $request->validate([
            'image'     => 'required|image|mimes:png|max:4096',
        ]);
        $news = News::findOrFail($id);

        $imageName = $news->id .'.png';
        $imageFile= $validated['image'];
        $imageNew = Image::make($imageFile);
        $imageFinal = $imageNew->resize(640, 360);
        $imageFinal->save('assets/news/'. $imageName);

        $news->image = $imageName;
        $news->save();

        return redirect()->route('home');
    }

    public function delete(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, "This route is meant for admins");
        }
        News::destroy($id);
        return redirect()->route('home');
    }

}
