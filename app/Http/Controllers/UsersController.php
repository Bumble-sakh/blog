<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    public function getUsers() {

        $data = [];

        $data = Arr::add($data, 'users', User::orderBy('created_at', 'desc')->get());

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        return view('users', $data);

    }

    public function getProfile() {

        $data = [];

        $user = User::where('id', Auth::user()->id)->get();

        $data = Arr::add($data, 'user', $user[0]);

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        return view('profile', $data);

    }
}
