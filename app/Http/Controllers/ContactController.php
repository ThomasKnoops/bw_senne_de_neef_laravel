<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request) {
        if(Auth::user()->isAdmin()) {
            return view('pages.Contact.index');
        }
        $contacts = Contact::where('state', 0)->paginate(10);
        abort(403, 'Only admins are allowed to use this route', compact('contacts'));
    }
    public function show(Request $request) {
        return view('pages.Contact.show');
    }
    public function store(Request $request) {

        $validated = $request->validate([
            'email'    => 'required|email:rfc|max:512',
            'question' => 'required|max:512',
        ]);

        $contact = Contact::create([
           'email' => $validated['email'],
           'question' => $validated['question']
        ]);

        $contact->save();

        return redirect()->route('home');
    }
}
