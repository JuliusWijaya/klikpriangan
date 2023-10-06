<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Post';
        $posts = Post::latest()->get();

        return view('post.index', ['title' => $title, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = 'Create Post';
        $categories = Category::all();
        $users = User::where('status', 'active')->select('id', 'username')->get();

        return view('post.create', ['title'    => $title, 'categories' => $categories])->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:120|unique:posts',
            'category_id'   => 'required',
            'user_id'       => 'required',
            'slug'          => 'required|unique:posts',
            'excerpt'       => 'required|max:130',
            'body'          => 'required',
            'photo'         => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = Str::lower(Auth::user()->username . '-' . now()->timestamp . '.' . $extension);
            $request->file('photo')->storeAs('image', $newName);
        }

        $validateData['image'] =  $newName;
        $validateData['excerpt'] = Str::limit($validateData['excerpt'], 150);
        $validateData['published_at'] = Carbon::now()->toDateString();
        $validateData['body'] = $validateData['body'];

        Post::create($validateData);
        Alert::success('Success', 'Successfully add post');
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = Post::where('slug', $post->slug)->first();

        return view('post.detail', ['title' => 'Details Post', 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = Post::where('slug', $post->slug)->first();
        $categories = Category::all();

        return view('post.edit', [
            'title'         => 'Edit ' . $post->title,
            'data'          => $data,
            'categories'    => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'category_id'   => 'required',
            'excerpt'       => 'required|max:130',
            'body'          => 'required',
            'photo'         => 'image|mimes:png,jpg,jpeg|max:2048',
        ];

        if ($request->slug != $post->slug || $request->title != $post->title) {
            $rules['slug']  = 'required|unique:posts';
            $rules['title'] = 'required|unique:posts';
        }

        $newName = '';

        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::disk('local')->delete('public/image/' . $request->oldImage);
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = Str::lower(Auth::user()->username . '-' . now()->timestamp . '.' . $extension);
            $request->file('photo')->storeAs('image', $newName);
        }

        $validateData = $request->validate($rules);
        $validateData['image'] = $newName;
        $validateData['user_id'] = Auth::user()->id;
        $validateData['excerpt'] = Str::limit($validateData['excerpt'], 180);
        $validateData['published_at'] = Carbon::now()->toDateString();
        $validateData['body'] = strip_tags($validateData['body']);

        $posts = Post::where('id', $post->id)->first();
        $posts->update($validateData);

        Alert::success('Success', 'Successfully update post');
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        Alert::success('Success', 'Successfully deleted post');
        return redirect('/posts');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}