<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('users', compact('employees'));
    }

    public function home()
    {
        return view('welcome', ['name' => 'home']);
    }

    public function create()
    {
        return view('createuser', ['name' => 'create user']);
    }

    public function getEmployee(string $slug)
    {
        $employee = Employee::where('slug', $slug)->first();

        return view('user', compact('employee'));
    }
}
