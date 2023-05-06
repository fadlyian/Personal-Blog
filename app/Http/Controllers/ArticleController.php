<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use Throwable;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::all();

        return view('article', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createArticle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $validated = $request->validate([
                'title' => 'required|min:3|max:255',
                'description' => 'required',
                'image' => 'required',
            ]);
        }catch (Exception $e) {
            return $e->getMessage();
        }


        $article = new Article();
        $article->title = $validated['title'];
        $article->text = $validated['description'];
        $article->image = $validated['image'];
        $article->save();

        return redirect('/article');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $article = Article::find($id);

        return view('detailBlog', [
            'article'=> $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $article = Article::findOrFail($id);

        return view('createArticle', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $validated = $request->validate([
                'title' => 'required|min:3|max:255',
                'description' => 'required',
                'image' => 'required',
            ]);

            $article = Article::find($id);
            $article['title'] = $validated['title'];
            $article['text'] = $validated['description'];
            $article['image'] = $validated['image'];

            $article->save();

            return redirect('/article');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        // dd($article);
        $article = Article::find($id);
        $article->delete();

        return redirect('/article');
    }
}
