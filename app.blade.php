<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts - Child-friendly font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #FF6B9D;
            --secondary-color: #FFC93C;
            --accent-color: #4ECDC4;
            --success-color: #95E1D3;
            --warning-color: #FFA07A;
            --info-color: #87CEEB;
        }
        
        body {
            font-family: 'Fredoka', 'Nunito', sans-serif;
            background: linear-gradient(135deg, #FFE5F1 0%, #E0F7FA 50%, #FFF9E6 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, #FF6B9D 0%, #FFC93C 100%) !important;
            box-shadow: 0 4px 15px rgba(255, 107, 157, 0.3);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 20px;
            margin: 0 5px;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .navbar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        .navbar-toggler {
            border: 2px solid white;
            border-radius: 10px;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .dropdown-menu {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            margin-top: 10px;
        }
        
        .dropdown-item {
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(135deg, #FF6B9D 0%, #FFC93C 100%);
            color: white;
        }
        
        .btn-nav {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-nav:hover {
            background: white;
            color: #FF6B9D;
            transform: scale(1.05);
        }
        
        .card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #FF6B9D 0%, #FFC93C 100%);
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 107, 157, 0.4);
        }
        
        .kindergarten-hero {
            background: linear-gradient(135deg, #FF6B9D 0%, #FFC93C 50%, #4ECDC4 100%);
            border-radius: 30px;
            padding: 60px 30px;
            color: white;
            text-align: center;
            margin: 30px 0;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        
        .kindergarten-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.2);
            animation: fadeInDown 1s ease-out;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .feature-card {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .feature-card:nth-child(1) { animation-delay: 0.1s; }
        .feature-card:nth-child(2) { animation-delay: 0.2s; }
        .feature-card:nth-child(3) { animation-delay: 0.3s; }
        .feature-card:nth-child(4) { animation-delay: 0.4s; }
        .feature-card:nth-child(5) { animation-delay: 0.5s; }
        .feature-card:nth-child(6) { animation-delay: 0.6s; }
        
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #FF6B9D 0%, #FFC93C 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .decorative-shape {
            position: absolute;
            opacity: 0.1;
            z-index: 0;
        }
        
        .shape-1 {
            width: 200px;
            height: 200px;
            background: #FF6B9D;
            border-radius: 50%;
            top: 10%;
            left: 5%;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            background: #FFC93C;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            bottom: 10%;
            right: 5%;
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .main-content {
            position: relative;
            z-index: 1;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        .gallery-img {
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .gallery-img:hover {
            transform: scale(1.05);
        }
        
        .card-img-top {
            transition: transform 0.3s ease;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.1);
        }
        
        .card {
            overflow: hidden;
        }
        
        .gallery-img {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .gallery-img:hover {
            transform: scale(1.08);
            filter: brightness(1.1);
        }
        
        .btn-light, .btn-outline-light {
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .btn-light:hover, .btn-outline-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        h2, h3, h4, h5 {
            letter-spacing: -0.5px;
        }
        
        .lead {
            line-height: 1.8;
        }
        
        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        @media (max-width: 768px) {
            .kindergarten-hero h1 {
                font-size: 2.5rem;
            }
            
            .kindergarten-hero {
                padding: 40px 20px;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-emoji-smile"></i> {{ config('app.name', 'Kindergarten') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                <i class="bi bi-house-door"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">
                                <i class="bi bi-info-circle"></i> About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">
                                <i class="bi bi-images"></i> Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#activities">
                                <i class="bi bi-calendar-event"></i> Activities
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                            @canany(['create articles', 'edit articles', 'delete articles', 'view articles'])
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}" href="{{ route('articles.index') }}">
                                        <i class="bi bi-file-earmark-text"></i> Articles
                                    </a>
                                </li>
                            @endcanany
                            @can('manage users')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                        <i class="bi bi-people"></i> Users
                                    </a>
                                </li>
                            @endcan
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-nav me-2" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-nav" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus"></i> {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person"></i> Profile
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
