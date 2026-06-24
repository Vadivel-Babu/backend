<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('uploads', 'public');

            Todo::create([
                'content' => $request->title,
                'img' => $path
            ]);
        } else {
            Todo::create([
                'content' => $request->title,
            ]);
        }

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo created successfully!');
    }

    public function getTodo(string $id)
    {
        $todo = Todo::where('id', $id)->first();

        return view('editform', compact('todo'));
    }

    public function getTodoByStatus(Request $request)
    {
        $todos = [];
        if ($request['status'] == 'completed') {
            $todos = Todo::where('isCompleted', 1)->get();
        } elseif ($request['status'] == 'not completed') {
            $todos = Todo::where('isCompleted', 0)->get();
        } else {
            $todos = Todo::all();
        }

        return view('welcome', compact('todos'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        $path = null;
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('uploads', 'public');
        }

        $todo = Todo::findorfail($id);
        $todo->content = $request->title;
        $todo->isCompleted = $request->isCompleted ?? 0;
        $todo->img = $path;
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
