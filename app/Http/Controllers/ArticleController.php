<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authId = Auth::id();
        $myArticles = Article::where('user_id', $authId)->get();
        $articles = Article::where('user_id', '!=', $authId)->get();
        $myArticles = $myArticles ?? [];
        $articles = $articles ?? [];
        return view('articles.index', ['myArticles' => $myArticles, 'articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $authId = Auth::id();
        $article = new Article();
        $article->name = $request->name;
        $article->content = $request->content;
        $article->user_id = $authId;
        $article->saveOrFail();
        return redirect()->action('ArticleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $article = Article::findOrFail($id);
            return view('articles.show', ['article' => $article]);
        } catch (\Exception $e) {
            return redirect()->action('ArticleController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $article = Article::findOrFail($id);
            return view('articles.edit', ['article' => $article]);
        } catch (\Exception $e) {
            return redirect()->action('ArticleController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->name = $request->name;
        $article->content = $request->content;
        $article->saveOrFail();
        return redirect()->action('ArticleController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(null, 204);
    }
}
