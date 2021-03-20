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
                    <input type="text" name="title" id="title" class="input @error('title') is-danger @enderror" value="{{ old('title') }}">

                    @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="excerpt">Excerpt</label>
                <div class="control">
                    <input type="text" name="excerpt" id="excerpt" class="input @error('excerpt') is-danger @enderror" value="{{ old('excerpt') }}">

                    @if ($errors->has('excerpt'))
                    <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="body">Body</label>
                <div class="control">
                    <textarea type="text" name="body" id="body" class="input @error('body') is-danger @enderror" value="{{ old('body') }}"></textarea>
                    @if ($errors->has('body'))
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="tag">Tag</label>
                <div class="select is-multiple control">
                    <select name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('tag'))
                    <p class="help is-danger">{{ $message }}</p>
                    @endif
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