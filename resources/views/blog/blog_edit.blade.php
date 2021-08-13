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
                <div class="card-header">Редактировать блог</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="blog_name" class="col-md-4 col-form-label text-md-right">Название</label>
                            <div class="col-md-6">
                                <input id="blog_name" type="text" class="form-control" name="blog_name" value="{{ $blog_name }}" required autofocus placeholder="Название блога">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="blog_description" class="col-md-4 col-form-label text-md-right">Описание</label>
                            <div class="col-md-6">
                                <textarea id="blog_description" rows="5" class="form-control" name="blog_description" required placeholder="Описание блога">{{ $blog_description }}</textarea>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="user_id" value="{{ $user_id }}"> --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary">
                                    Изменить
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