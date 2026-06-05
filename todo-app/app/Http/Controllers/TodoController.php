<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('welcome', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
        Todo::create([
            'content' => $request->title,
        ]);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo created successfully!');
    }

    public function getTodo(string $id)
    {
        $todo = Todo::where('id', $id)->first();

        return view('editform', compact('todo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = Todo::findorfail($id);
        $todo->content = $request->title;
        $todo->save();

        return redirect()->route('todos.index');
    }

    public function destroy(string $id)
    {
        $todo = Todo::findorfail($id);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
