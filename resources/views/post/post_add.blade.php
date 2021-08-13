@extends('index')

@section('content')

<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-8">

            @isset($message)
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endisset

            <div class="card">
                <div class="card-header">Создать пост</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Название</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus placeholder="Название поста">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Текст</label>
                            <div class="col-md-6">
                                <textarea id="text" rows="5" class="form-control" name="text" required placeholder="Текст поста"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary">
                                    Создать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection