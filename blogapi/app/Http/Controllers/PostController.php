<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::with('user')->get());
    }

    public function store(Request $request)
    {
        return response()->json(['name' => 'post created']);
    }

    public function show(Post $post)
    {
        return PostResource::collection(Post::with('user')->find($post));
    }

    public function update(Request $request)
    {
        return response()->json(['name' => 'post updated'], 201);
    }

    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post);
        $post->delete();

        return response()->noContent();
    }
}
