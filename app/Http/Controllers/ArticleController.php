<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\HasImageUpload;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
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
            $validated = Validator::make($request->all(),[
                'title' => 'required|unique',
                'text' => 'required',
                'category_id' => 'required',
                'image' => 'nullable|max:512'
            ]);

            // $validated['image'] = $this->uploadImage($request->file('image'));
            $article = Article::create($request->all());

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
    public function show($id)
    {
        //
        $article = Article::find($id);

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
