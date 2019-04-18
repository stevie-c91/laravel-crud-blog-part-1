@section('title', 'Edit Post')
@section('action', route('posts.create'))
@extends('layout')

@section('content')

<h1 class="title">Edit: {{ $post->title }}</h1>

<form method="post" action="{{ route('posts.update', [$post->slug]) }}">

    @csrf
    @method('patch')
    @include('partials.errors')

    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input type="text" name="title" value="{{ $post->title }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
        </div>
    </div>

    <div class="field">
        <label class="label">Content</label>
        <div class="control">
            <textarea name="content" class="textarea" placeholder="Content" minlength="5" maxlength="2000" required rows="10">{{ $post->content }}</textarea>
        </div>
    </div>

    <div class="field">
        <label class="label">Category</label>
        <div class="control">
            <div class="select">
                <select name="category" required>
                    <option value="" disabled selected>Select category</option>
                    <option value="html" {{ $post->category === 'html' ? 'selected' : null }}>HTML</option>
                    <option value="css" {{ $post->category === 'css' ? 'selected' : null }}>CSS</option>
                    <option value="javascript" {{ $post->category === 'javascript' ? 'selected' : null }}>JavaScript</option>
                    <option value="php" {{ $post->category === 'php' ? 'selected' : null }}>PHP</option>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link is-outlined">Update</button>
        </div>
    </div>

</form>

@endsection
