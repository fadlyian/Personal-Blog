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
        //
        $category = Category::all();

        return view('pages.category.index', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        // dd('berhasil');
        $category = Category::create($request->all());

        return redirect()->route('category.index')->with(['success' => 'Create Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        // $category = Category::find($category);
        // return view('createCategory', []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);

        return view('pages.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = Category::find($id);

        $category->update($request->all());

        return redirect()->route('category.index')->with(['success' => 'Updated Success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();

        return redirect('/category')->with(['success' => 'Delete Success']);
    }
}
