<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title)? $title:'' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"> 

    <link href="/css/my_style.css" rel="stylesheet" type="text/css">
</head>
<body>

   <!--- <img src="{{ asset('images/BG.jpg') }}" alt="" id="bg">-->

  <header id="header">
            <div class="row">

                <nav class="navbar navbar-expand-lg bg-transparent m-none">
                    <div class="container-fluid">   
                        <div class="collapse navbar-collapse justify-content" id="navbarNav">
                        
                            <a class="navbar-brand" href="/"><h1>PhotoPinHub</h1></a>
    
                            <form action="" class="d-flex" role="search" method="GET">
                                <input class="my-base-input" type="search" name="name" placeholder="пошук" aria-label="Search">

                            </form>

                            @guest
                                @if (Route::has('login'))
                                    <a class="nav-link me-2" href="{{ route('login') }}">Вхід</a>
                                @endif

                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Рестрація</a>
                                @endif
                            @else 
                            <div>
                                <div class="custom-dropdown-btn">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="ava">{{ Auth::user()->name}}</span>
                                    </a>
                                </div>

                                <div class="custom-dropdown-menu dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">      
                                            <a class="dropdown-item" href="/profile">Профіль</a>                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Вийти') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                </div> 
                            </div> 
                            @endguest
                        </div>
                    </div>
                </nav>

        </div>
    </header>      

    <div id="app" class="container py-4">
        <div class="my-row">
            <main class="col-12">
                @yield('content')
            </main>
        </div>

    </div>

   <footer class="text-center" id="footer">
        <address class="col">
            <div>PhotoPinHub, 2023</div>
            <div>© Кішечки.</div>
        </address>
    </footer>  

    <script src="https://kit.fontawesome.com/c04e65d013.js" crossorigin="anonymous"></script>
    
    <script src="/js/jquery.js"></script>
    <script src="/js/most_used.js"></script>
    
</body>
</html>
