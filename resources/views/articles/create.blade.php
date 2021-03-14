@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
        <form method="POST" action="/articles">
            @csrf
            <div class="field">
                <label for="title">Title</label>
                <div class="control">
                    <input type="text" class="input" name="title" id="title">
                </div>
            </div>

            <div class="field">
                <label for="excerpt">Excerpt</label>
                <div class="control">
                    <input type="text" class="input" name="excerpt" id="excerpt">
                </div>
            </div>

            <div class="field">
                <label for="body">Body</label>
                <div class="control">
                    <textarea type="text" class="input" name="body" id="body"></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection