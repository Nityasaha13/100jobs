<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Public feed: show the latest posts.
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a single post.
     */
    public function show(Post $post)
    {
        $author = User::find($post->user_id);
        return view('posts.single_post', compact('post', 'author'));
    }

    /**
     * Store a newly created post.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data['user_id'] = Auth::id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Post::create($data);

        return redirect()->route('my-posts')->with('message', 'Post published successfully!');
    }

    /**
     * Show the form for editing the post.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('my-posts')->with('error', 'You are not authorized to edit this post.');
        }

        $user = Auth::user();
        return view('posts.edit', compact('post', 'user'));
    }

    /**
     * Update the specified post.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('my-posts')->with('error', 'You are not authorized to update this post.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($data);

        return redirect()->route('my-posts')->with('message', 'Post updated successfully!');
    }

    /**
     * Remove the specified post.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('my-posts')->with('error', 'You are not authorized to delete this post.');
        }

        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('my-posts')->with('message', 'Post deleted successfully!');
    }
}
