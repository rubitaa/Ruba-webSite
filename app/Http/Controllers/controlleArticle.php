<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class controlleArticle extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select('id', 'user_id', 'title', 'content')
            ->with(['user' => function($userQuery){
                $userQuery->select('id', 'name');
            }])
            ->orderBy('id','desc')->get();

        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');
        return view('articles.creat',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'max:100|min:20|required',
            'content'=>'max:2000|min:50|required',
            'categories'=>'required'
        ]);

       $user = auth()->user();

       $categories = array_values($request->categories);
       $article= $user->articles()->create($request->except('categories'));
       $article->categories()->attach($categories);


        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if(auth()->id() != $article->user_id) {
            return abort(401);
        }

        $categories = Category::pluck('title','id');

        $artCategories= $article->categories()->pluck('id')->toArray();

        return view(' articles.edit',compact('categories','article','artCategories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        if(auth()->id()!= $article->user_id) {
            return abort(401);
        }


        $request->validate([
            'title'=>'max:80|min:20|required',
            'content'=>'max:200|min:50|required',
            'categories'=>'required'

        ]);

        $article->update($request->all());

        $article->categories()->sync($request->categories);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(auth()->id() != $article->user_id)
        {
            return abort(401);
        }

        if($article->delete()){
            return redirect()->back();
        }

        return abort('Error deleteing your article', 500);
    }
}
