<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class SinglePageController extends Controller
{
    protected $hari;
    protected $hari_ini;

    public function __construct()
    {
        $this->hari = date("D");

        switch ($this->hari) {
            case 'Sun':
                $this->hari_ini = "Minggu";
                break;

            case 'Mon':
                $this->hari_ini = "Senin";
                break;

            case 'Tue':
                $this->hari_ini = "Selasa";
                break;

            case 'Wed':
                $this->hari_ini = "Rabu";
                break;

            case 'Thu':
                $this->hari_ini = "Kamis";
                break;

            case 'Fri':
                $this->hari_ini = "Jumat";
                break;

            case 'Sat':
                $this->hari_ini = "Sabtu";
                break;

            default:
                $this->hari_ini = "Tidak di ketahui";
                break;
        }
    }

    public function about()
    {
        $title      = 'About us - Klikpriangan';
        $categories = Category::latest()->get();

        return view('pages.about', [
            'title'      => $title,
            'categories' => $categories,
            'days'       => $this->hari_ini,
        ]);
    }

    public function redaksi()
    {
        $title = 'Redaksi - Klik Priangan';
        $categories = Category::latest()->get();

        return view('pages.redaksi', [
            'title'      => $title,
            'categories' => $categories,
            'days'       => $this->hari_ini,
        ]);
    }

    public function media()
    {
        $title = 'Pedoman Media Siber - Klik Priangan';
        $categories = Category::latest()->get();
        return view('pages.pedoman', [
            'title'      => $title,
            'categories' => $categories,
            'days'       => $this->hari_ini,
        ]);
    }

    public function iklan()
    {
        $title = 'Info Iklan - Klik Priangan';
        $categories = Category::latest()->get();
        return view('pages.info', [
            'title'      => $title,
            'categories' => $categories,
            'days'       => $this->hari_ini,
        ]);
    }

    public function contact()
    {
        $title = 'Kontak - Klik Priangan';
        $categories = Category::latest()->get();

        return view('pages.contact', [
            'title'      => $title,
            'categories' => $categories,
            'days'       => $this->hari_ini,
        ]);
    }
}