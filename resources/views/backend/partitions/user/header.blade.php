<div id="header">	
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">BRANDS</a></li>
        <li><a href="">DESIGNERS</a></li>
        <li><a href="">CONTACT</a></li>  
        <li>
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="change-password">Change Password</a>
                <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
            </div>
        </li>
        @stack('search')                                            
    </ul>		
</div>
