<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift CMS - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    @include('layouts.header')
    
    @if (\Session::has('success'))
        <div class="msg alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    {{-- <div class="wrapper"> --}}
        <aside class="sidebar-dynamic">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <strong>Dashboard</strong>
            </a>
            <a href="{{ url('/admin/pages') }}">
                <i class="far fa-file"></i>
                <strong>Pages</strong>
            </a>
            <a href="{{ url('/admin/users') }}">
                <i class="fas fa-users"></i>
                <strong>Users</strong>
            </a>
        </aside>
        <main class="content wrapper">
            <div class="content-title">
                <h1>@yield('title')</h1>
            </div>
            @yield('content')
            {{-- <footer class="footer">
                <strong>Copyright &copy; Swift CMS</strong>
            </footer> --}}
        </main>
    {{-- </div> --}}
</body>
</html>