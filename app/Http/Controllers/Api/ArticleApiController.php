<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleDetailResource;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $article = Article::all();
        return ArticlesResource::collection($article);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',
        ]);

        $article = Article::create($request->all());
        return new ArticlesResource($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Article::with('category:id,name')->find($id);
        return new ArticleDetailResource($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
