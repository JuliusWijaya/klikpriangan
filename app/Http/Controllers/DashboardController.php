<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $title    = 'Dashboard';
        $users    = User::count();
        $category = Category::count();

        return view('dashboard.index', [
            'title'      => $title,
            'users'      => $users,
            'categories' => $category,
            'post'       => Post::where('user_id', auth()->user()->id)->count(),
        ]);
    }

    public function profile(User $user)
    {
        return view('dashboard.profile', [
            'title'   => $user->name,
            'user'    => $user,
        ]);
    }

    public function password()
    {
        return view('auth.password', ['title'   => 'Ubah Password']);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password'          => 'required|current_password',
            'new_password'          => 'required|confirmed',
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();

        return back()->with('success', 'Password successfully changed!');
    }
}
