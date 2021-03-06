@extends('index')

@section('content')

<div class="container">
<div class="row justify-content-center">

    <div class="col-8">

        @foreach ($posts as $post)      
        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <a href="{{ route('profile', $post->blog->user_id) }}" class="text-dark">
                    <h4 class="my-0 fw-normal">{{ $post->blog->user->name }}</h4>
                </a>                
                <small class="my-0 me-2"> @datetime($post->created_at) </small>  
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $post->name }}</h2>
                <p class="list-unstyled mt-3 mb-4">
                    <span>{{ $post->text }}</span>
                </p>
                @can('postAuthor', $post)
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('post_edit', $post->id) }}" class="btn btn-outline-primary btn-sm" role="button">
                        <i class="bi bi-file-earmark-code"></i><span> Edit post</span>
                    </a>
                </div>
                @endcan
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