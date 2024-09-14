<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutuscontroller extends Controller
{
    public function aboutus()
    {
        return view('user.aboutus'); // This will return the aboutus.blade.php view
    }
}
