<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return "Hello Laravel";
        $title = "Article - Index";
        $json = [
            [
                'name' => 'honda',
                'age' => '20',
            ],
            [
                'name' => 'takuto',
                'age' => '19',
            ],
        ];
        // return json_encode($json); //コンテンツタイプがhtml
        // return response()->json($json);
        // return view("article.index", ['title' => $title], ['json' => $json]);
        return view("article.index", compact('title', 'json'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
