<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Your other methods...

    public function logout(Request $request)
    {
        Auth::logout();  // This logs out the current user

        // Invalidate the session to remove any role-related data
        $request->session()->invalidate();

        // Regenerate the session token to avoid session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/login');
    }
}

