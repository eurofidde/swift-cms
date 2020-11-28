<header class="header">
    <div class="header__left">
        <a href="/">Swift CMS</a>
    </div>
    <div class="header__right">
        @guest
            <a href="b{{ url('admin/login') }}">Login</a>
        @else
            <div class="dropdown">
                <a class="dropdown__toggle">{{ Auth::user()->name }}</a>
                <div class="dropdown__content">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
</header>