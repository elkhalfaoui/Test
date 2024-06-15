<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return(view('articles.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Article::create([
            "designation"=>$request->input("designation"),
            "prix"=>$request->input("prix"),
            "quantite"=>$request->input("quantite"),
        ]);
        return redirect()->route('articles.index')->with('message1', 'article bien Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Article::update([
        //     "designation"=>$request->input("designation"),
        //     "prix"=>$request->input("prix"),
        //     "quantite"=>$request->input("quantite"),
        // ]);
        $article = Article::find($id);
        $article->designation = $request->input('designation');
        $article->prix = $request->input('prix');
        $article->quantite = $request->input('quantite');
        $article->save();
        return redirect()->route('articles.index')->with('message1', 'article bien Modifier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        $article->delete();
        // Article::destroy($id);
        return redirect()->route('articles.index')->with('message1', 'article avec l\'id:'. $article->id.' bien Supprimer');
    }
    public function search() {
        return view('articles.search');
    }
}
