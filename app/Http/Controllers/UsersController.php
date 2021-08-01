<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(1);
        // $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }
}
