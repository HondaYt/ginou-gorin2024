<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Article - Index";
        $articles = (new Article())->get();

        // return view("article.index", compact('title', 'articles'));

        return ArticleResource::collection($articles);

        // return $articles
        //     // ->orderBy('id', 'DESC')
        //     // ->where('title', '=', 'サンプル2のタイトル')
        //     // ->orWhere('title', '=', 'サンプル3のタイトル')
        //     // ->select('title')
        //     ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->session()->regenerate();

        $article = new Article();
        $article->title = $request->input('title');
        $article->save();
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return Article::find($id);

        $article = new Article();
        $article = $article->find($id);



        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('article.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = new Article();
        $article = $article->find($id);

        $article->title = $request->input('title');
        $article->body = $request->input('body');

        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = new Article();
        $article = $article->find($id);
        $article->delete();

        return redirect()->route('article.index');
    }
}
