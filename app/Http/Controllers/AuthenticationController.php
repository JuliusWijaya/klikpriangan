<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        $title = 'Login';

        return view('auth.login', ['title'  => $title]);
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:3', 'max:20'],
            'password' => ['required', 'min:6', 'max:16'],
        ]);

        // cek apakah login valid
        if (Auth::attempt($credentials)) {
            // cek apakah status user active ?
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'Failed!');
                Session::flash('message', 'Your Account is not active yet, pleas contact Admin!');
                return redirect('/login');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect()->intended('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect()->intended('profile');
            }
        }

        Session::flash('status', 'Failed!');
        Session::flash('message', 'Login Invalid Username or Password Wrong!');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
