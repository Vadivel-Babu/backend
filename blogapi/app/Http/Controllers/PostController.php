<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return PostResource::collection(Post::with(['user', 'category'])
            ->withCount(['comments', 'likes'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%'.$request->search.'%');
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->latest()
            ->paginate());
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'min:5|required|string',
            'content' => 'min:20|required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validate['author_id'] = $request->user()->id;

        // 2. Check if an image was uploaded
        if ($request->hasFile('image')) {
            // Stores file in storage/app/public/posts and returns the path
            $path = $request->file('image')->store('posts', 'public');
            $validate['image'] = $path;
        }

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
            'category_id' => 'required'
        ]);

        $validate['author_id'] = $request->user()->id;

        if ($request->hasFile('image')) {
            // Delete the old image file from storage if it exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Store the new image file
            $validate['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validate);

        return response()->json(['message' => 'post updated successfully', 'status' => true]);
    }

    public function destroy(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->getRawOriginal('image'));
        }

        $post->delete();

        return response()->noContent();
    }
}
