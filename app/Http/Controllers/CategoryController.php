<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->paginate(10);
        return view('category.index', ['category' => $category]);
    }


    public function create()
    {
        return view('category.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
        ]);


        $cat = [
            'name' => $request->name,
        ];

        Category::create($cat);

        return redirect()->route('category.index')->with('status', 'Category added Successfully');
    }


    public function show()
    {

    }


    public function edit(Category $category)
    {

        return view('category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
        ]);

        $cat = [
            'name' => $request->name,
        ];
        //   dd($cat);
       $category->update($cat);

       return redirect()->route('category.index')->with('status', 'Category updated Successfully');

    }


    public function destroy(string $id)
    {
        //
    }
}
