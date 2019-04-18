<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all Posts, ordered by the newest first
        $posts = Post::latest()->get();

        // Pass Post Collection to view
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show create post form
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate posted form data
        $validated = $request->validate([
            'title'    => 'required|string|unique:posts|min:5|max:100',
            'content'  => 'required|string|min:5|max:2000',
            'category' => 'required|string|max:30'
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($validated['title'], '-');

        // Create and save post with validated data
        $post = Post::create($validated);

        // Redirect the user to the created post woth a success notification
        return redirect(route('posts.show', [$post->slug]))->with('notification', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Pass current post to view
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validate posted form data
        $validated = $request->validate([
            'title'    => 'required|string|unique:posts|min:5|max:100',
            'content'  => 'required|string|min:5|max:2000',
            'category' => 'required|string|max:30'
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($validated['title'], '-');

        // Update Post with validated data
        $post->update($validated);

        // Redirect the user to the created post woth an updated notification
        return redirect(route('posts.show', [$post->slug]))->with('notification', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Delete the specified Post
        $post->delete();

        // Redirect user with a deleted notification
        return redirect(route('posts.index'))->with('notification', '"' . $post->title .  '" deleted!');
    }
}
