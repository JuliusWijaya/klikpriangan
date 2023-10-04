<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function register_action(Request $request)
    {
        $request->validate([
            'username' => 'required|',
            'email'    => 'required|email:dns',
            'password' => 'required',
        ]);

        $user = new User([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        Session::flash('status', 'Success!');
        Session::flash('message', 'Successfully register pleas contact admin for active account');
        return redirect()->route('login');
    }

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
