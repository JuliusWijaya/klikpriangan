<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Category';
        $categories = Category::withCount('posts')->latest()->get();

        return view('categories.index', ['title' => $title, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'  => 'required|max:85',
        ]);

        Category::create($validate);
        Alert::success('Success', 'Successfully add category');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        if ($slug) {
            return response()->json(['status' => 200, 'slug' => $slug]);
        } else {
            return response()->json(['status' => 404, 'message' => 'Slug Not Found!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        if ($category) {
            return response()->json([
                'status'     => 200,
                'category'   => $category
            ]);
        } else {
            return response()->json([
                'status'     => 404,
                'message'    => 'Not found!',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name'  => 'required',
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validateData = $request->validate($rules);
        Category::where('id', $category->id)
            ->update($validateData);
        Alert::success('Success', 'Successfully updated category');

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        Alert::success('Success', 'Successfully deleted category');
        return redirect('/categories');
    }
}
