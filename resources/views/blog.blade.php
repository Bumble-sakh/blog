@extends('index')

@section('content')

<div class="container">
<div class="row justify-content-center">
    
    <div class="col-8">

        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <h1 class="my-0 fw-normal">{{ $blog->name}}</h1>
                
            </div>

            <div class="card-body">
                <h3 class="my-0 me-2 mb-5">{{ $blog->description }}</h3>
                <div class=" d-flex flex-row justify-content-between">
                    <span class="pt-2">Всего постов: {{ $blog->posts->count() }}</span>
                    <a href="{{ route('main') }}" class="btn btn-outline-primary" role="button">
                        <i class="bi bi-clipboard-plus"></i><span> Add post</span>
                    </a>
                </div>
                
                
            </div>

            <div class="card-footer py-3 d-flex flex-row justify-content-between">
                <div class="pt-2">
                    <h6 class="my-0 fw-normal">{{ $blog->user->name }}
                    <small>@datetime($blog->created_at)</small>
                </div>
                <div class="">
                    <a href="{{ route('blog_edit', $blog->id) }}" class="btn btn-outline-primary" role="button">
                        <i class="bi bi-pencil"></i><span> Edit blog</span>
                    </a>
                    <a href="{{ route('blog_delete', $blog->id) }}" class="btn btn-outline-primary" role="button">
                        <i class="bi bi-trash"></i><span> Delete blog</span>
                    </a>
                </div>                

            </div>
        </div>
        
        @foreach ($blog->posts as $post)      
        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal h2">{{ $post->name }}</h4>
                <small class="my-0 me-2">{{ $post->blog->user->name }} @datetime($post->created_at) </small>  
            </div>
            <div class="card-body">
                <p class="list-unstyled mt-3 mb-4">
                    {{ $post->text }}
                </p>
                <a href="{{ route('blog_edit', $blog->id) }}" class="btn btn-outline-primary" role="button">
                    <i class="bi bi-pencil"></i><span> Edit blog</span>
                </a>
            </div>
            <div class="card-footer py-3">
                <h6 class="my-0 fw-normal">
                    <i class="bi bi-bar-chart"></i><span>+12</span>
                    <i class="bi bi-binoculars"></i><span>25</span>
                    
                </h6>
            </div>
        </div>             
        @endforeach
    </div>
    
</div>
</div>
   
@endsection