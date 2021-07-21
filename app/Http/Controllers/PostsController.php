<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Post;
use Illuminate\Support\Arr;

class PostsController extends Controller
{
    public function getPosts() {

        $data = [];

        $data = Arr::add($data, 'posts', Post::orderBy('created_at', 'desc')->get());

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        return view('main', $data);

    }
    
}
