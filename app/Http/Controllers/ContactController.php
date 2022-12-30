<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request) {
        return view('pages.Contact.index');
    }
    public function show(Request $request, $id) {
        return view('pages.Contact.show');
    }
    public function store(Request $request) {
    }
}
