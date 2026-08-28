<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('users', ['name' => 'all']);
    }

    public function home()
    {
        return view('welcome', ['name' => 'home']);
    }

    public function create()
    {
        return view('createuser', ['name' => 'create user page']);
    }

    public function getEmployee()
    {
        return view('user', ['1' => 'one']);
    }
}
