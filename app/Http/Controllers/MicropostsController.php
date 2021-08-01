<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Micropost;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (Auth::check()) {
            $user = Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(5);
            // $microposts = Micropost::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }

        return view('welcome', $data);
    }
}
