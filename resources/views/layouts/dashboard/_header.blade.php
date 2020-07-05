<header class="app-header"><a class="app-header__logo" style="font-family: 'lato' ,sans-serif;" href="{{ route('manage.dashboard') }}">{{ config('app.name') }}</a>

    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

    <!-- User Menu-->
        <li><a class="app-nav__item" href="{{ url('/') }}" target="_blank"><i class="fa fa-eye fa-lg"></i></a>

        <li class="dropdown">
            <a class="app-nav__item" href="{{ route('logout') }}" data-toggle="dropdown" aria-label="Open Profile Menu" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                <i class="fa fa-sign-out fa-lg"></i>
            </a>
        </li>
    </ul>
</header>
