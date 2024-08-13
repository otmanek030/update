<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Afficher le formulaire et les produits
    public function index()
    {
        $contact = Contact::all(); // Récupérer tous les produits
        return view('user.contact', compact('contact'));
    }

    // Ajouter un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'comment' => 'nullable|string|max:1000',

        ]);

        Contact::create([
            'fullname' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('tel'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('contact.index');
    }

}
