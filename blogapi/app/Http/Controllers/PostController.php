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

    public function update(Request $request)
    {
        return response()->json(['name' => 'post updated']);
    }

    public function destroy(Request $request)
    {
        return response()->json(['name' => 'post deleted']);
    }
}
