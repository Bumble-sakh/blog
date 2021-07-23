@extends('index')

@section('content')

<div class="container">
<div class="row justify-content-center">
    
    <div class="col-8">

        @foreach ($users as $user)
        <div class="card rounded-3 shadow-sm mb-3">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">{{ $user->name }}</h4>
                <small class="my-0 me-2"> @datetime($user->created_at) </small>
            </div>
            <div class="card-body">

                <ul>
                    @foreach ($user->blogs as $blog)
                        <li>{{ $blog->name }} ({{ $blog->posts->count() }})</li>                        
                    @endforeach                    
                </ul>

            </div>
        </div>
        @endforeach

    </div>   
    
</div>
</div>
   
@endsection 