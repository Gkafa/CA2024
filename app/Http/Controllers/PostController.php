<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index(User $user = null)
    {
        $posts = Post::when($user, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->whereNotNull('image')
            ->whereNotNull('published_at')
            ->orderBy('promoted', 'desc')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        $users = User::whereHas('posts', function ($query) {
            $query->
            whereNotNull('published_at');
        })->get();

        return view('posts.index', compact('posts', 'users'));
    }

    public function promoted()
    {
        $posts = Post::where('promoted', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12);
        return view('posts.promoted', compact('posts'));
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create the comment and associate it with the post
        $post->comments()->create([
            'name' => $request->name,
            'body' => $request->body,
        ]);

        return redirect()->route('post', $post)
            ->with('success', 'Comment added successfully.');
    }

    public function show(Post $post)
    {
        if (!$post->published_at) {
            abort(404);
        }
//        $poster = Post::with('comments')->findOrFail($post->$id);
        $post->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');  // Order comments by 'created_at' in descending order
        }, 'comments.user']);
        return view('posts.show', compact('post'));
    }

    public function deleteComment(Comment $comment){
        $comment->delete();
        return redirect()->route('post', $comment->post)
            ->with('success', 'Comment deleted successfully.');
    }
}
