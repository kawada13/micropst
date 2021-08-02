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


    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        // $request->user()->microposts()->create([
        //     'content' => $request->content,
        // ]);

        $micropost = new Micropost;
        $micropost->user_id = Auth::id();
        $micropost->content = $request->content;
        $micropost->save();

        return back();
    }


    public function destroy($id)
    {
        $micropost = Micropost::find($id);

        if (Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        return back();
    }
}
