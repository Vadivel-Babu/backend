<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return response()->json($comments);
    }

    public function store(Request $request, Post $post)
    {
        $validate = $request->validate(['comment' => 'required|min:5']);
        $validate['user_id'] = Auth::id();
        $validate['post_id'] = $post->id;
        $comment = Comment::create($validate);

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully!',
        ], 201);
    }

    public function update(Request $request, Post $post, Comment $comment)
    {
        // $comment = Comment::find($id);
        $request->validate(['comment' => 'required|min:5']);
        $comment['comment'] = $request['comment'];
        $comment->save();

        return response()->json(['message' => 'comment updated successfully']);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return response()->noContent();
    }
}
