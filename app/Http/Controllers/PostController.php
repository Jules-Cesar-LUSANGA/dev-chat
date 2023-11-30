<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        // Get all posts
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store_post(PostRequest $request)
    {
        // Save the post
        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->save();

        return to_route('posts.show', $post);
    }
    public function show(Post $post) {
        Auth::logout();
        Auth::loginUsingId(2);
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }
    public function update(Post $post, PostRequest $request) {
        // Update the post
        $post->content = $request->content;
        $post->save();

        // show the post
        return view('posts.show', compact('post'));
    }
    public function delete(Post $post) {
        // Delete the post
        $post->delete();

        return to_route('posts.index')->with("success", "Post deleted successfully");
    }

    public function add_comment(Post $post, CommentRequest $request) {
        
        // Add a new comment
        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return Redirect::back();
    }
}
