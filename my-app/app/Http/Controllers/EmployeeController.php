<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();

        return view('users', compact('data'));
    }

    public function home()
    {
        return view('welcome', ['name' => 'home']);
    }

    public function create()
    {
        return view('createuser', ['name' => 'create user page']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'required|email|unique:customer',
            'occupation' => 'required|string',
        ]);

        // 2. Insert into database using Eloquent Model
        Employee::create($validatedData);

        // 3. Redirect back with a success message
        return redirect()->route('add')->with('success', 'Form data submitted successfully!');
    }

    public function getEmployee(string $id)
    {
        $employee = Employee::find($id);

        return view('user', compact('employee'));
    }

    public function remove(string $id)
    {
        $data = Employee::findorfail($id);
        $data->delete();

        return redirect()->route('allusers');
    }
}
