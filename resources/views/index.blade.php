<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>Главная</title>
</head>

<body>
    
    
    <header class="d-flex flex-row justify-content-between align-items-center py-3 mb-4 border-bottom">

        <div class="mx-4">
            <a href="/" class = "text-dark text-decoration-none">
                <i class="bi bi-box"></i>
            </a>
        </div>
        
        <div>
            <ul class = "nav">
                <li><a href="{{ route('main') }}" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="{{ route('blogs') }}" class="nav-link px-2 link-dark">Блоги</a></li>
                <li><a href="{{ route('users') }}" class="nav-link px-2 link-dark">Пользователи</a></li>
            </ul>
        </div>

        <div class="mx-4">

            @guest
            <a href="{{ route('login')}}" class="btn btn-outline-primary me-2" role="button">Войти</a>            
            <a href="{{ route('register')}}" class="btn btn-primary" role="button">Регистрация</a>
            @endguest

            @auth
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $name }}
                <i class="bi bi-emoji-smile"></i>               
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="{{ route('profile')}}">Профиль</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Выход</a></li>
            </ul>
            @endauth
                        
        </div>
        
    </header>
    

    <main class="py-4">
        
        @yield('content') 
        
    </main>

<script src="{{ asset('js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>