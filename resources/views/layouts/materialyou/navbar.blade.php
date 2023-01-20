<nav class="navbar navbar-expand-md navbar-light border-bottom py-3 sticky-top">
    <div class="container align-items-baseline">

        <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">
            <span>
                <img src="{{ asset('assets/images/unpak.png') }}" alt="logo-unpak" height="32px">
            </span>
            <!--
            <span class="mx-3">
                <img src="{{ asset('assets/images/kampus-merdeka.png') }}" alt="logo-kampus-merdeka" height="32px">
            </span>
        -->
            {{ config('app.name', 'Laravel') }}

        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto"></ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link fw-semibold p-3 mx-1 @if ($title == 'Home') mtrlyou-nav-active rounded @endif"
                        href="{{ route('landing') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold p-3 mx-1 @if ($title == 'About') mtrlyou-nav-active rounded @endif"
                        href="{{ route('about') }}">About</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link fw-semibold p-3 mx-1 mtrlyou-btn-solid rounded"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-semibold p-3 mx-1 @if ($title == 'Dashboard') mtrlyou-nav-active rounded @endif"
                            href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle p-3 fw-semibold" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end text-bg-white border-0 shadow"
                            aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
