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

    public function getEmployee(string $id)
    {
        $employee = Employee::find($id);

        return view('user', compact('employee'));
    }
}
