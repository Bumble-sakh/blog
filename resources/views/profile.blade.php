@extends('index')

@section('content')

<div class="container">
<div class="row justify-content-center">
    
    <div class="col-8">
        @can('author', $user)
        <div class="mb-2">
            <a href="{{ route('blog_add') }}" class="btn btn-outline-primary" role="button">
                <i class="bi bi-clipboard-plus"></i><span> Add blog</span>
            </a>
        </div>
        @endcan

        @foreach ($user->blogs as $blog)
        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <a href="{{ route('blog', $blog->id) }}" class="text-dark">
                    <h4 class="my-0 fw-normal">{{ $blog->name}}</h4>
                    <small class="my-0 me-2">{{ $blog->description }}</small>
                </a>                
            </div>
            <div class="card-body">
                <p>Всего постов: {{ $blog->posts->count() }}</p>
                <ul>
                    @foreach ($blog->posts as $post)
                    <li>
                        {{ $post->name }}
                        @can('author', $user)
                        <a href="{{ route('post_edit', $post->id) }}" role="button">
                            <i class="bi bi-file-earmark-code" title="Edit post"></i>
                        </a>
                        <a href="{{ route('post_delete', $post->id) }}" role="button">
                            <i class="bi bi-file-earmark-minus icon_red" title="Delete post"></i>
                        </a>
                        @endcan
                    </li>
                    @endforeach                  
                </ul>
                @can('author', $user)
                <div class="d-flex justify-content-end">
                    <a href="{{ route('post_add', $blog->id) }}" class="btn btn-outline-primary btn-sm" role="button">
                        <i class="bi bi-file-earmark-plus"></i><span> Add post</span>
                    </a>
                </div>
                @endcan                
            </div>

            @can('author', $user)
            <div class="card-footer py-3 d-flex justify-content-end">
                <a href="{{ route('blog_edit', $blog->id) }}" class="btn btn-outline-primary mx-2 my-0" role="button">
                    <i class="bi bi-pencil"></i><span> Edit blog</span>
                </a>
                <a href="{{ route('blog_delete', $blog->id) }}" class="btn btn-outline-danger" role="button">
                    <i class="bi bi-trash icon_red"></i><span> Delete blog</span>
                </a>
            </div>
            @endcan
        </div>
        @endforeach

    </div>
</div>
</div>
   
@endsection