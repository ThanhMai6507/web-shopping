<div id="header">	
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">BRANDS</a></li>
        <li><a href="">DESIGNERS</a></li>
        <li><a href="">CONTACT</a></li>  

        @if (Auth::user())
        <li>
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            {{ Auth::user()->name ?? null}}
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="change-password">Change Password</a>
                <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
            </div>
        </li>
        @endif
        
        @stack('search')                                            
    </ul>		
</div>
