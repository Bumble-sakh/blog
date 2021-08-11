<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Support\Arr;

class BlogsController extends Controller
{
    
    public function getBlogs() {

        $data = [];

        $data = Arr::add($data, 'blogs', Blog::orderBy('created_at', 'desc')->get());

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }
        
        return view('blogs', $data);

    }

    public function getBlog() {

        $id = 1;

        $data = [];

        $data = Arr::add($data, 'blog', Blog::where('id', $id)->first());       

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        return view('blog', $data);

    }


}
