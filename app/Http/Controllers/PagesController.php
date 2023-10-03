<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Klik Priangan';
        $categories = Category::select('id', 'name')->get();

        return view('pages.index', [
            'title'      => $title,
            'categories' => $categories,
        ]);
    }

    public function about()
    {
        $title = 'About us - Klik Priangan';

        return view('pages.about', ['title' => $title]);
    }

    public function redaksi()
    {
        $title = 'Redaksi - Klik Priangan';

        return view('pages.redaksi', ['title' => $title]);
    }

    public function pedomanMedia()
    {
        $title = 'Pedoman Media Siber - Klik Priangan';

        return view('pages.pedoman', ['title'  => $title]);
    }

    public function infoIklan()
    {
        $title = 'Info Iklan - Klik Priangan';

        return view('pages.info', ['title' => $title]);
    }

    public function contact()
    {
        $title = 'Kontak - Klik Priangan';

        return view('pages.contact', ['title' => $title]);
    }
}
