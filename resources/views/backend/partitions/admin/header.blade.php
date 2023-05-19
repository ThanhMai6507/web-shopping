<nav class="navbar navbar-expand-sm bg-dark navbar-dark kind header">
    <div class="" style="margin-left: 13%; padding-left:7%">
        @stack('search')
    </div>
    <div style="margin-left: 32%">
        <ul class="navbar-nav">
            @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form-user').submit();">
                        Logout
                    </a>

                    <form id="logout-form-user" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>

</nav>
