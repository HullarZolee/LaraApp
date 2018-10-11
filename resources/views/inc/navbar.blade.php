<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        @guest
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <bold>
                You are a guest
            </bold>
        </div>
        @else
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            {{-- custume links --}}
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/service">
                        Service
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">
                        Contact Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tickets">
                        Tickets
                    </a>
                </li>
            </ul>
            @endguest
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </li>
                @else
                <li class="nav-item ">
                    <a class="nav-link btn btn-outline-success font-weight-bold text-light" href="/posts/create">
                        Create post
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                        {{ Auth::user()->name }}
                        <span class="caret">
                        </span>
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/home">
                            Dashboard<span class="badge badge-primary badge-pill">14</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>