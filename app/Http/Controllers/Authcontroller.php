<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;

class Authcontroller extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if($request->user()->role === 'admin'){
            return redirect()->route('dashboard');
       }

       if($request->user()->role === 'user'){
            return redirect()->route('shop.index');
       }

        return redirect()->route('login');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.dashboard');
    }



    public function signup()
    {
        return view("auth.signup");
    }

    public function signupPost(Request $request): RedirectResponse
{
    try {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Insert user into the database
        $user = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('login')->with('success', 'User created successfully');
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}
}
