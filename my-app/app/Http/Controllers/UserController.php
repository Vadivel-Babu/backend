<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = 'home';

        return view('welcome', compact('data'));
    }

    public function getUsers()
    {
        $data = [['id' => 1, 'name' => 'vel'], ['id' => 2, 'name' => 'mani']];

        return view('users', compact('data'));
    }

    public function getUser($id)
    {
        $data = [['id' => 1, 'name' => 'vel'], ['id' => 2, 'name' => 'mani']];
        $user = collect($data)->firstWhere('id', $id);

        return view('user', compact('user'));
    }
}
