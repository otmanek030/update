<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    // Show all contacts
    public function index()
    {
        $contacts = Contact::all(); // Retrieve all contacts
        return view('admin.contacts', compact('contacts'));
    }
}
