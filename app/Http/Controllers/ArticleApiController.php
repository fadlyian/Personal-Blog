<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleDetailResource;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleApiController extends Controller
{
    //
    public function index(){
        return ArticlesResource::collection(Article::all());
    }

    public function show($id){
        $data = Article::with('category:id,name')->find($id);
        return new ArticleDetailResource($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',
        ]);

        $article = Article::create($request->all());
        return new ArticlesResource($article);
    }

}
