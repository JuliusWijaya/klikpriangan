<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class SinglePageController extends Controller
{
    public function about()
    {
        $title      = 'About us - Klikpriangan';
        $categories = Category::latest()->get();

        return view('pages.about', [
            'title' => $title,
            'categories' => $categories,
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

    public function media()
    {
        $title = 'Pedoman Media Siber - Klik Priangan';
        $categories = Category::latest()->get();
        return view('pages.pedoman', ['title'  => $title, 'categories' => $categories]);
    }

    public function iklan()
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