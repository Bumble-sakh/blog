<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

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

    public function getBlog($id) {

        $data = [];

        $data = Arr::add($data, 'blog', Blog::where('id', $id)->first());       

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        return view('blog.blog', $data);

    }

    public function addBlog(Request $request) {            

            $data = [];
            $data = Arr::add($data, 'name', Auth::user()->name);

            if($request->isMethod('get')) {

                return view('blog.blog_add', $data);
    
            } else {
    
                //Validate
    
                //end
    
                $blog = new Blog();
                $blog->name = $request->name;
                $blog->description = $request->description;
                $blog->user_id = Auth::user()->id;
                $blog->save();
    
                $data = Arr::add($data, 'message', 'Блог ' . $blog->name . ' создан!');
    
                return view('blog.blog_add', $data);            
    
            }

    }

    public function editBlog(Request $request, $blog_id) {

        $data = [];
        $data = Arr::add($data, 'name', Auth::user()->name);
        
        $blog = Blog::where('id', $blog_id)->first();

        //authotization
        if (Gate::denies('blogAuthor', $blog)) {
            abort(403);
        }

        if($request->isMethod('get')) {

            $data = Arr::add($data, 'blog_name', $blog->name);
            $data = Arr::add($data, 'blog_description', $blog->description);

            return view('blog.blog_edit', $data);

        } else {

            //Validate

            //end

            $blog->name = $request->blog_name;
            $blog->description = $request->blog_description;
            $blog->user_id = Auth::user()->id;

            $blog->save();

            $data = Arr::add($data, 'blog_name', $blog->name);
            $data = Arr::add($data, 'blog_description', $blog->description);

            $data = Arr::add($data, 'message', 'Блог ' . $blog->name . ' изменен!');

            return view('blog.blog_edit', $data);

        }
    }

    public function deleteBlog($blog_id) {

        $data = [];
        $data = Arr::add($data, 'name', Auth::user()->name);
        
        $blog = Blog::where('id', $blog_id)->first();
        
        //authotization
        if (Gate::denies('blogAuthor', $blog)) {
            abort(403);
        }

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        $blog->delete();

        $data = Arr::add($data, 'blog_name', $blog->name);
        $data = Arr::add($data, 'blog_description', $blog->description);

        $data = Arr::add($data, 'message', 'Блог ' . $blog->name . ' удален!');

        return view('blog.blog_delete', $data);

    }

}