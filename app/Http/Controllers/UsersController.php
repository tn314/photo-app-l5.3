<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function name($name)
    {
        $user = User::where('name', $name)->first();

        $photos = $user->photos;

        return view('users.show')->with([
            'user' => $user,
            'photos' => $photos
        ]);
    }

    public function addFriend($name, Request $request)
    {
        $friend = User::where('name', $name)->first();

        request()->user()->addFriend($friend);

        return back();
    }

    public function deleteFriend($name, Request $request)
    {
        $friend = User::where('name', $name)->first();

        request()->user()->deleteFriend($friend);

        return back();
    }
}
