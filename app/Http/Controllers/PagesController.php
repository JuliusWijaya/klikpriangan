<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Klik Priangan';
        $categories = Category::latest()->get();
        $posts = Post::skip(1)->take(3)->latest()->get();

        return view('pages.index', [
            'title'      => $title,
            'categories' => $categories,
            'posts'      => $posts,
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

    public function category(Category $category)
    {
        $categories = Category::all();

        return view('posts.category', [
            'title'         => 'Category ' . $category->name,
            'datas'         => $category->posts,
            'categories'    => $categories,
        ]);
    }

    public function detailPost(Post $post)
    {
        $data = Post::where('slug', $post->slug)->first();
        $data->latest()->paginate(5);
        $categories = Category::all();

        return view('posts.blog_details', [
            'title'      => $post->title,
            'data'       => $data,
            'categories' => $categories
        ]);
    }
}
