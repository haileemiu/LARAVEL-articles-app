<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    // list all data
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

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
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    // Persist that ^ new data
    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        
        // Temp. hard coded
        $article->user_id = 1;
        $article->save();
        //

        $article->tags()->attach(request('tags')); // correct

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

        return redirect(route('articles.show', $article));
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            /*
            Now that the validation does not match to model,
            time to separate the validation (see "store")
            */
            'tags' => 'exists:tags,id'
        ]);
    }
}
