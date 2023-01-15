<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request) {
        if(Auth::user()->isAdmin()) {

            $contacts = Contact::where('state', 0)->paginate(10);
            return view('pages.Contact.index', compact('contacts'));
        }
        abort(403, 'Only admins are allowed to use this route');
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

    public function answer_show(Request $request, $id) {
        if(!Auth::user()->isAdmin()){
            abort(403, "This is a route for admins");
        }
        $contact = Contact::findOrFail($id);
        return view('pages.Contact.answer', compact('contact'));
    }

    public function answer_store(Request $request, $id) {
        if(!Auth::user()->isAdmin()){
            abort(403, "This is a route for admins");
        }
        $validated = $request->validate([
            'answer'          => 'required|max:255'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->state = 1;
        $contact->answer = $validated['answer'];
        $contact->save();
        return redirect()->route('admin.index');
    }

    public function destroy(Request $request, $id) {
        if(!Auth::user()->isAdmin()){
            abort(403, "This is a route for admins");
        }
        Contact::destroy($id);
        return redirect()->route('admin.index');
    }
}
