@extends('index')

@section('content')

<div class="container">
<div class="row justify-content-center">
    
    <div class="col-8">

        @foreach ($blogs as $blog)
        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{ $blog->user->name }}</h4>
                <small class="my-0 me-2"> @datetime($blog->created_at) </small>
                <p>{{$blog->posts->count() }}</p> 
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $blog->name}}</h2>
                <p class="list-unstyled mt-3 mb-4">
                    <span>{{ $blog->description }}</span>
                </p>
                
                    @forelse ($blog->posts as $post)
                        <p>
                            {{ $post->name }}
                        </p>    
                    @empty
                        
                    @endforelse
                    
                
            </div>
            <div class="card-footer py-3">
                <h4 class="my-0 fw-normal"></h4>
            </div>
        </div>
        @endforeach

    </div>    
    

    

</div>
</div>
   
@endsection 