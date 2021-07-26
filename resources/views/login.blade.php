@extends('index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Вход</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus placeholder="admin@site.com">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >
                                    <label class="form-check-label" for="remember">
                                        Запомнить меня
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Войти
                                </button>
                                <a class="btn btn-link" href="http://bs4.sleepingowladmin.ru/password/reset">
                                        Забыли пароль?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection