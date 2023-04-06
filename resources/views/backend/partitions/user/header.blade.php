<div id="header">	
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">BRANDS</a></li>
        <li><a href="">DESIGNERS</a></li>
        <li><a href="">CONTACT</a></li>  
        <li>
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            {{ Auth::user()->name ?? null}}
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="change-password">Change Password</a>
                <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
            </div>
        </li>
        <li>
            <a style="width: 85%; margin-left:50%" href="{{ route('show.cart') }}">Cart</a>
        </li>

        @stack('search')                                            
    </ul>		
</div>
