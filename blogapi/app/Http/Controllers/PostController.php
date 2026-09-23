<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();

        return response()->json($post);
    }

    public function store(Request $request)
    {
        return response()->json(['name' => 'post created']);
    }

    public function getPostById(string $id)
    {
        $post = Post::find($id);

        return response()->json($post);
    }

    public function update(Request $request)
    {
        return response()->json(['name' => 'post updated']);
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'post deleted successfully']);
    }
}
