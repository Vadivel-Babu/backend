<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::with(['user', 'category'])->withCount(['comments', 'likes'])->get());
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'min:5|required|string',
            'content' => 'min:20|required',
            'author_id' => 'required',
            'category_id' => 'required'
        ]);
        $validate['slug'] = $request['title'];
        Post::create($validate);

        return response()->json(['message' => 'post created successfully', 'status' => true]);
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments', 'category'])->loadCount(['comments', 'likes']);

        return new PostResource($post);
    }

    public function update(Post $post, Request $request)
    {
        $validate = $request->validate([
            'title' => 'min:5|required|string',
            'content' => 'min:20|required',
            'author_id' => 'required',
            'category_id' => 'required'
        ]);

        $post->update($validate);

        return response()->json(['message' => 'post updated successfully', 'status' => true]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
}
