<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title    = 'Dashboard';
        $users    = User::count();
        $category = Category::count();
        $posts = Post::count();

        return view('dashboard.index', ['title' => $title, 'users' => $users, 'categories' => $category,])->with('posts', $posts);
    }
}