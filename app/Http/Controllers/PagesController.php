<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class PagesController extends Controller
{
    public function index()
    {
        $title = 'Post';
        $categories = Category::latest()->get();
        $posts = Post::with(['category', 'author'])->skip(1)->take(3)->latest()->get();

        return view('pages.index', [
            'title'      => $title,
            'categories' => $categories,
            'posts'      => $posts,
        ]);
    }

    public function about()
    {
        $title      = 'About us - Klikpriangan';
        $categories = Category::latest()->get();

        return view('pages.about', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function redaksi()
    {
        $title = 'Redaksi - Klik Priangan';
        $categories = Category::latest()->get();

        return view('pages.redaksi', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function pedomanMedia()
    {
        $title = 'Pedoman Media Siber - Klik Priangan';
        $categories = Category::latest()->get();
        return view('pages.pedoman', ['title'  => $title, 'categories' => $categories]);
    }

    public function infoIklan()
    {
        $title = 'Info Iklan - Klik Priangan';
        $categories = Category::latest()->get();
        return view('pages.info', ['title' => $title, 'categories' => $categories]);
    }

    public function contact()
    {
        $title = 'Kontak - Klik Priangan';
        $categories = Category::latest()->get();
        return view('pages.contact', ['title' => $title, 'categories' => $categories]);
    }
}