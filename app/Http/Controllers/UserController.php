<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('auth.create');
    }

    public function store(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'wa_number' => $request->wa_number,
            'password' => $request->password
        ]);

        redirect('auth/login');
    }

    public function loginView() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/ex');
        }

        return back()->with('errorLogin', 'Login Failed');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent session fixation attacks
        $request->session()->regenerateToken();

        return redirect('/auth/login')->with('success', 'You have been logged out.');
    }
}
