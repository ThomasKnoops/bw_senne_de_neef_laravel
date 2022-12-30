<?php

namespace App\Http\Controllers;

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

    public function questionCreate(Request $request) {
        return view('pages.Faq.question-create');
    }
    public function questionStore(Request $request) {

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
}
