<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(['name' => 'comments']);
    }

    public function store(Request $request)
    {
        return response()->json(['name' => 'comment created']);
    }

    public function update(Request $request)
    {
        return response()->json(['name' => 'comment updated']);
    }

    public function destroy(Request $request)
    {
        return response()->json(['name' => 'comment deleted']);
    }
}
