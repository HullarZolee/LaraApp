<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            {{-- custume links --}}
            <ul class="nav navbar-nav mr-auto">
                @auth
                <li class="nav-item">
                    <h4><a class="nav-link badge badge-primary text-white mr-2 pb-3 pt-3" href="/posts">
                        Blog
                    </a></h4>
                </li>
                
                @if(auth()->user()->isAdmin == 1)
                <li class="nav-item">
                        <h4><a class="nav-link badge badge-primary text-white mr-2 pb-3 pt-3" href="/tickets">
                        Tickets
                    </a></h4>
                </li>
                @endif
                <li class="nav-item">
                        <h4><a class="nav-link badge badge-primary text-white mr-2 pb-3 pt-3" href="/contact">
                        Contact Us
                    </a> </h4>
                </li>
                @endauth
            </ul>
            
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <h4><a class="nav-link badge badge-success text-white p-2 mr-2 btn btn-lg" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a></h4>
                </li>
                <li class="nav-item">
                    <h4><a class="nav-link badge badge-primary text-white p-2 mr-2 btn btn-lg" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a></h4>
                </li>
                @else
                <li class="nav-item ">
                    <a class="btn btn-outline-light font-weight-bold mr-4" href="/posts/create">
                        Create post
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a aria-expanded="false" aria-haspopup="true" 
                    class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                        <span class="font-weight-bold">{{ Auth::user()->name }} </span> 
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