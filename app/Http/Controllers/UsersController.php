<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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

    public function getProfile($id = null) {

        $data = [];

        if($id == null) {
            $user = User::where('id', Auth::user()->id)->get();
        } else {
            $user = User::where('id', $id)->get();
        }        

        $data = Arr::add($data, 'user', $user[0]);

        $data = Arr::add($data, 'name', Auth::user()->name);

        return view('profile', $data);

    }
}
