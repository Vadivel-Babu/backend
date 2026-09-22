<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(['name' => 'post one']);
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
