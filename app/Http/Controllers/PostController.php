<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View; 
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->posts()->create($validated);
 
        return redirect(route('posts.index'));
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post): View
    {

        Gate::authorize('update', $post);
 
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    
    {
        Gate::authorize('update', $post);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $post->update($validated);
 
        return redirect(route('posts.index'));   
    }

    public function destroy(Post $post) : RedirectResponse
    {
        Gate::authorize('delete', $post);
 
        $post->delete();
 
        return redirect(route('posts.index'));
    }
}
