<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Blog;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

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

    public function addPost(Request $request, $blog_id) {            

        $data = [];
        $data = Arr::add($data, 'name', Auth::user()->name);

        $blog = Blog::where('id', $blog_id)->first();

        //authotization
        if (Gate::denies('blogAuthor', $blog)) {
            abort(403);
        }

        if($request->isMethod('get')) {

            return view('post.post_add', $data);

        } else {

            //Validate

            //end

            $post = new Post();
            $post->name = $request->name;
            $post->text = $request->text;
            $post->blog_id = $blog_id;
            $post->save();

            $data = Arr::add($data, 'message', 'Пост ' . $post->name . ' создан!');

            return view('post.post_add', $data); 

        }
        

    }

    public function editPost(Request $request, $id) {

        $data = [];
        $data = Arr::add($data, 'name', Auth::user()->name);
        
        $post = Post::where('id', $id)->first();

        //authotization
        if (Gate::denies('postAuthor', $post)) {
            abort(403);
        }

        if($request->isMethod('get')) {

            $data = Arr::add($data, 'post_name', $post->name);
            $data = Arr::add($data, 'text', $post->text);

            return view('post.post_edit', $data);

        } else {

            //Validate

            //end

            $post->name = $request->name;
            $post->text = $request->text;
            $post->save();

            $data = Arr::add($data, 'post_name', $post->name);
            $data = Arr::add($data, 'text', $post->text);

            $data = Arr::add($data, 'message', 'Пост ' . $post->name . ' изменен!');

            return view('post.post_edit', $data);

        }
    }

    public function deletePost($id) {

        $data = [];
        $data = Arr::add($data, 'name', Auth::user()->name);
        
        $post = Post::where('id', $id)->first();
        
        //authotization
        if (Gate::denies('postAuthor', $post)) {
            abort(403);
        }

        if(Auth::check()) {

            $data = Arr::add($data, 'name', Auth::user()->name);

        }

        $post->delete();

        $data = Arr::add($data, 'message', 'Блог ' . $post->name . ' удален!');

        return back();

    }
    
}
