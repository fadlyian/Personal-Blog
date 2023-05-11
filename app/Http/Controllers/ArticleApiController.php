<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleDetailResource;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use Illuminate\Http\Request;

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
}
