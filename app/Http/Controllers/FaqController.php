<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function categoryCreate(Request $request) {
        return view('pages.Faq.category-create');
    }
    public function categoryStore(Request $request) {

    }
    public function categoryUpdate(Request $request, $id) {

    }
    public function categoryDelete(Request $request, $id) {

    }

    public function questionCreate(Request $request, $id) {
        $category = FaqCategory::findOrFail($id);
        return view('pages.Faq.question-create', compact('category'));
    }
    public function questionStore(Request $request, $id) {
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
    public function questionUpdate(Request $request, $id) {

    }
    public function questionDelete(Request $request, $id) {

    }

    public function index(Request $request) {
        return view('pages.Faq.index');
    }

    public function CategoryIndex(Request $request, $id) {
        printf('%s', $id);
        return view('pages.Faq.category-index');
    }

    public function categoryEdit(Request $request, $id) {
        $category = FaqCategory::findOrFail($id);
        return view('pages.Faq.category-edit', compact('category'));
    }

    public function questionEdit(Request $request, $id) {
        $question = FaqQuestion::findOrFail($id);
        return view('pages.Faq.question-edit', compact('question'));
    }
}
