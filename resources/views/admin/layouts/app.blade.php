<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Swift - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="header__logo">
            <a href="{{ url('/admin') }}">Swift CMS | Admin Portal</a>
        </div>
        <div class="header__user">
            <div class="dropdown-dark">
                <div class="dropdown-dark__toggle">
                    <a>{{ Auth::user()->name }}</a>
                </div>
                <div class="dropdown-dark__content">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        
    </header>
    <aside class="sidebar">
        <a href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <strong>Dashboard</strong>
        </a>
        <a href="{{ url('/admin/pages') }}">
            <i class="far fa-file"></i>
            <strong>Pages</strong>
        </a>
    </aside>
    <main class="content">
        @yield('content')
    </main>
</body>
</html>