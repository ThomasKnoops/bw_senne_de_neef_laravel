<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function categoryCreate(Request $request) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        return view('pages.Faq.category-create');
    }
    public function categoryStore(Request $request) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }

        $validated = $request->validate([
            'category_name'    => 'required|max:255',
        ]);

        $category = FaqCategory::create([
            'name' => $validated['category_name']
        ]);
        $category->save();

        return redirect()->route('admin.index');
    }
    public function categoryUpdate(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $category = FaqCategory::findOrFail($id);

        $validated = $request->validate([
            'category_name'    => 'required|max:255',
        ]);
        $category->name = $validated['category_name'];
        $category->save();

        return redirect()->route('faq.category.edit', $id);
    }
    public function categoryDelete(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $category = FaqCategory::findOrFail($id);
        $category->questions->delete();
        FaqCategory::destroy($id);
        return redirect()->route('admin.index');
    }

    public function questionCreate(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $category = FaqCategory::findOrFail($id);
        return view('pages.Faq.question-create', compact('category'));
    }
    public function questionStore(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $category = FaqCategory::findOrFail($id);

        $validated = $request->validate([
            'question'    => 'required|max:255',
            'answer'     => 'required|max:255',
        ]);

        $qa = FaqQuestion::create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category_id' => $category->id
        ]);

        return redirect()->route('faq.category.edit', $category->id);
    }
    public function questionUpdate(Request $request, $cid, $qid) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $question = FaqQuestion::findOrFail($qid);

        $validated = $request->validate([
            'question'    => 'required|max:255',
            'answer'     => 'required|max:255',
        ]);

        $question->question = $validated['question'];
        $question->answer = $validated['answer'];

        $question->save();

        return redirect()->route('faq.category.edit', $question->category_id);
    }
    public function questionDelete(Request $request, $cid, $qid) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }

        FaqCategory::destroy($qid);
        return redirect()->route('admin.index');
    }

    public function index(Request $request) {
        $categories = FaqCategory::all();
        $contacts = Contact::where('state', 1)->get();
        return view('pages.Faq.index', compact('categories', 'contacts'));
    }

    public function CategoryIndex(Request $request, $id) {
        printf('%s', $id);
        return view('pages.Faq.category-index');
    }

    public function categoryEdit(Request $request, $id) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $category = FaqCategory::findOrFail($id);
        return view('pages.Faq.category-edit', compact('category'));
    }

    public function questionEdit(Request $request, $cid, $qid) {
        if(!Auth::user()->isAdmin()) {
            abort(403, 'This route is for admins');
        }
        $category = FaqCategory::findOrFail($cid);
        $question = FaqQuestion::findOrFail($qid);
        return view('pages.Faq.question-edit', compact('category','question'));
    }
}
