<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show() {
        return view('auth.register');
    }

    public function store(Request $request) {
        //verification

        //end
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();

        Auth::login($user);
        return redirect()->intended('profile');
    }
}
