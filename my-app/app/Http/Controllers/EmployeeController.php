<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::where('user_id', Auth::id())->get();

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
        $userId = Auth::id();
        $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'required|email|unique:customer',
            'occupation' => 'required|string',
        ]);

        $data = ['name' => $request->name, 'mail' => $request->mail, 'occupation' => $request->occupation, 'user_id' => $userId];

        // 2. Insert into database using Eloquent Model
        Employee::create($data);

        // 3. Redirect back with a success message
        return redirect()->route('add')->with('success', 'Form data submitted successfully!');
    }

    public function getEmployee(string $id)
    {
        $employee = Employee::find($id);

        return view('user', compact('employee'));
    }

    public function updateEmployee(string $id, Request $request)
    {
        $employee = Employee::find($id);

        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'occupation' => 'required|string',
        // ]);

        $employee['name'] = $request['name'];
        $employee['occupation'] = $request['occupation'];
        $employee->save();
        $this->getEmployee($id);

        return redirect()->route('user', ['id' => $id]);
    }

    public function remove(string $id)
    {
        $data = Employee::findorfail($id);
        $data->delete();

        return redirect()->route('allusers');
    }
}
