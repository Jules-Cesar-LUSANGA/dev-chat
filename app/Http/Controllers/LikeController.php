<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    public function set($post_type, $post_id)
    {
        switch ($post_type) {
            case 'post':
                $post = Post::findOrFail($post_id);
                break;
            case 'comment':
                $post = Comment::findOrFail($post_id);
                break;
            default:
                return abort(404);
                break;
        }

        $post->likes()->create([
            'user_id' => Auth::id(),
        ]);

        return Redirect::back();
    }
    public function unset($post_type, $post_id)
    {
        switch ($post_type) {
            case 'post':
                $post = Post::findOrFail($post_id);
                break;
            case 'comment':
                $post = Comment::findOrFail($post_id);
                break;
            default:
                return abort(404);
                break;
        }

        $post->likes()->where(
            'user_id',Auth::id(),
        )->delete();

        return Redirect::back();
    }
}
