<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title    = 'Dashboard';
        $users    = User::count();
        $category = Category::count();

        return view('dashboards.index', ['title' => $title, 'users' => $users, 'categories' => $category]);
    }
}
