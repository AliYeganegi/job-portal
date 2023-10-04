<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts', compact('contacts'));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        // ]);

        Contact::create([
            'name' => 'Arthur'
        ]);

        return back();
    }
}
