<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
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

    public function index()
    {
        $title = 'Klik Priangan - Aktual dan Unik';
        $categories = Category::get(['id', 'name', 'slug']);
        $posts = Post::with(['category', 'author'])->where('category_id', '=', 1)->orderBy('id', 'desc')->take(3)
            ->get(['id', 'title', 'slug', 'user_id', 'category_id', 'published_at', 'image']);
        $opini = Post::select('id', 'title', 'category_id', 'user_id', 'slug', 'published_at', 'image')
            ->where('category_id', '=', 2)->orderBy('published_at', 'desc')->first();
        $pendidikan = Post::select('id', 'title', 'category_id', 'user_id', 'slug', 'published_at', 'image')
            ->where('category_id', '=', 3)->orderBy('published_at', 'desc')->first();
        $news = Post::with(['author', 'category'])->popular(request(['keyword']))->orderBy('published_at', 'desc')->paginate(4)->withQueryString();
        $sport = Post::with(['author', 'category'])->where('category_id', 5)->orderBy('published_at', 'desc')->first();

        return view('pages.index', [
            'title'      => $title,
            'categories' => $categories,
            'posts'      => $posts,
            'opini'      => $opini,
            'education'  => $pendidikan,
            'news'       => $news,
            'sport'      => $sport,
            'days'       => $this->hari_ini,
        ]);
    }

    public function category(Category $category)
    {
        $categories = Category::latest()->get();

        return view('posts.category', [
            'title'         => 'Category ' . $category->name,
            'datas'         => $category->posts->load('author'),
            'categories'    => $categories,
            'days'          => $this->hari_ini,
        ]);
    }

    public function authorPost(User $author)
    {

        return view('posts.author', [
            'title'         => $author->username,
            'author'        => $author->post()->with(['author', 'category'])->paginate(4),
            'categories'    => Category::latest()->get(),
            'days'          => $this->hari_ini,
        ]);
    }

    public function detail(Post $post)
    {
        $data  = Post::where('slug', $post->slug)->first();
        $posts = Post::select('id', 'title', 'excerpt', 'slug', 'image')->limit(5)->orderBy('published_at', 'desc')->get();
        $categories = Category::select('id', 'name', 'slug')->get();

        return view('posts.blog_details', [
            'title'         => $post->title,
            'data'          => $data,
            'posts'         => $posts,
            'categories'    => $categories,
            'days'          => $this->hari_ini,
        ]);
    }
}
