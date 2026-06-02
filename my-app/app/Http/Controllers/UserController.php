<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $data = [['id' => 1, 'name' => 'vel'], ['id' => 2, 'name' => 'mani']];

    public function index()
    {
        $data = 'home';

        return view('welcome', compact('data'));
    }

    private function convertObject(array $arr)
    {
        return json_decode(json_encode($arr));
    }

    public function getUsers()
    {
        $obj = $this->convertObject($this->data);

        return view('users', compact('obj'));
    }

    public function getUser(string $id)
    {
        $user = collect($this->convertObject($this->data))->firstWhere('id', $id);

        return view('user', compact('user'));
    }
}
