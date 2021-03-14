<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    // list all data
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    // show 1 data item
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    // Create new data
    public function create()
    {
        return view('articles.create');
    }

    // Persist that ^ new data
    public function store()
    {
        Article::create(request()->validateArticle());
        
        return redirect('/articles');
    }

    // Change the data
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    // Persist the change ^
    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect('/articles/' . $article->id);
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
