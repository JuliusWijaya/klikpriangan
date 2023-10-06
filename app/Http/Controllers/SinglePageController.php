<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class SinglePageController extends Controller
{
    public function category(Category $category)
    {
        $categories = Category::latest()->get();

        return view('posts.category', [
            'title'         => 'Category ' . $category->name,
            'datas'         => $category->posts->load('author'),
            'categories'    => $categories,
        ]);
    }

    public function detailPost(Post $post)
    {
        $data = Post::where('slug', $post->slug)->first();
        $posts = Post::select('id', 'title', 'slug')->limit(5)->orderBy('published_at', 'desc')->get();
        $categories = Category::all();

        return view('posts.blog_details', [
            'title'      => $post->title,
            'data'       => $data,
            'posts'      => $posts,
            'categories' => $categories
        ]);
    }

    public function authorPost(User $author)
    {
        return view('posts.author', [
            'title'         => $author->username,
            'author'        => $author->post,
            'categories'    => Category::latest()->get(),
        ]);
    }
}