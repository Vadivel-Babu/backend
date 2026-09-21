<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $role = $request->role ? $request->role : 'user';
        $pass = Hash::make($request->password);
        $data = ['name' => $request->name, 'role' => $role, 'email' => $request->email, 'password' => $pass];

        return response()->json($data);
    }

    public function login(Request $request)
    {
        $role = $request->role ? $request->role : 'user';
        $pass = Hash::make($request->password);
        $data = ['name' => $request->name, 'role' => $role, 'email' => $request->email, 'password' => $pass];

        return response()->json($data);
    }
}
