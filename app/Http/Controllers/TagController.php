<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tag = Tag::all();

        return view('pages.tag.index', [
            'tags' => $tag,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => "required|unique:tags",
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('tag.index')->with(['success' => 'Created Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tag = Tag::find($id);

        return view('pages.tag.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|unique:tags',
        ]);


        Tag::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tag.index')->with(['success' => 'Update Success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('tag.index')->with(['success' => 'Delete Success']);
    }
}
