@extends('index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @isset($message)
            <div class="alert alert-warning" role="alert">
                {{ $message }}
            </div>
            @endisset

        </div>
    </div>
</div>

@endsection