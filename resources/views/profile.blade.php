@extends('index')

@section('content')

<div class="container">
<div class="row justify-content-center">
    
    <div class="col-8">

        @foreach ($user->blogs as $blog)
        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{ $blog->name}}</h4>
                <small class="my-0 me-2">{{ $blog->description }}</small>
            </div>
            <div class="card-body">
                <p>Всего постов: {{ $blog->posts->count() }}</p>
                <ul>
                    @foreach ($blog->posts as $post)
                    <li>{{ $post->name }}</li>
                    @endforeach                    
                </ul>
            </div>
        </div>
        @endforeach

    </div>
</div>
</div>
   
@endsection