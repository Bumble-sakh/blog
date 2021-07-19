<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>Главная</title>
</head>

<body>
    
    
    <header class="d-flex flex-row justify-content-between align-items-center py-3 mb-4 border-bottom">

        <div class="mx-4">
            <a href="/" class = "text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
            </a>
        </div>
        
        <div>
            <ul class = "nav">
                <li><a href="{{ route('main') }}" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href={{ route('blogs') }} class="nav-link px-2 link-dark">Блоги</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Пользователи</a></li>
            </ul>
        </div>

        <div class="mx-4">

            @guest
            <a href="{{ route('login')}} " class="btn btn-outline-primary me-2" role="button">Login</a>            
            <a href="{{ route('register')}} " class="btn btn-primary" role="button">Register</a>
            @endguest

            @auth
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $name }}
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-emoji-smile rounded-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>                
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Профиль</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href={{ route('logout') }}>Выход</a></li>
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