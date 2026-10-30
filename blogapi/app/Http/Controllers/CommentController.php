<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $validate = $request->validate(['comment' => 'required|min:5|max:25', 'post_id' => 'required', 'user_id' => 'required']);
        $comment = Comment::create($validate);

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully!',
        ], 201);
    }

    public function update(Comment $comment, Request $request)
    {
        // $comment = Comment::find($id);
        $request->validate(['comment' => 'required|min:5', 'post_id' => 'required', 'user_id' => 'required']);
        $comment['comment'] = $request['comment'];
        $comment->save();

        return response()->json(['message' => 'comment updated successfully']);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(['message' => 'comment deleted successfully']);
    }
}
