<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::all();


        return view('pages.article.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.article.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $validated = $request->validate([
                'title' => 'required',
                'text' => 'required',
                'category_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if($request->file('image')){
                $validated['image'] = $request->file('image')->store('article-images');
            }

            $article = Article::create($validated);

            if($request->tag_ids)
            {
                $article->tags()->attach($request->tag_ids);
            }

            return redirect()->route('article.index')->with(['success' => 'Create success']);
        }catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('pages.article.show', [
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
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.article.edit', [
            'article' => $article,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $validated = Validator::make($request->all(), [
                'title' => 'required',
                'text' => 'required',
                'category_id' => 'required',
            ]);

            $article = Article::find($id);
            if($request->tag_ids)
            {
                $article->tags()->detach();
                $article->tags()->attach($request->tag_ids);
            }
            $article->update($request->all());

            return redirect()->route('article.index')->with(['success' => 'Update success']);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $article = Article::find($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('article.index')->with(['success' => 'Delete success']);
    }
}
