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
        $validate = $request->validate(['comment' => 'required|min:5', 'post_id' => 'required', 'user_id' => 'required']);
        $comment = Comment::create($validate);

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully!',
            'data' => $comment
        ], 201);
    }

    public function update(string $id, Request $request)
    {
        $comment = Comment::find($id);
        $comment['comment'] = $request['comment'];
        $comment->save();

        return response()->json(['message' => 'comment updated successfully']);
    }

    public function destroy(string $id)
    {
        $data = Comment::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'comment deleted successfully']);
    }
}
