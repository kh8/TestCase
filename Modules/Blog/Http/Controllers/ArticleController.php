<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Article;
use Modules\Blog\Transformers\ArticleResource;
use Modules\Blog\Transformers\ArticleCollection;
use Modules\Blog\Http\Requests\ArticleRequest;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function browse()
    {
        $articles = Article::all();;
        return response()->json(
            new ArticleCollection($articles),
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(ArticleRequest $request)
    {
        $validated = $request->validated();
        $newArticle = Article::create($validated);
        return response()->json(
            new ArticleResource($newArticle),
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function read($id)
    {
        $article = Article::findOrFail($id);;
        return response()->json(
            new ArticleResource($article),
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->validated());
        return response()->json(
            new ArticleResource($article),
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(
            'Deleted',
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']
        );
    }
}
