<nav class="navbar navbar-expand-sm bg-dark navbar-dark kind">
@stack('search')

<div style="margin-left: 32%">
    <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">Register</a>
    </li>
    <li class="nav-item dropdown navbar-nav">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Change Password</a>
          <a class="dropdown-item" href="{{ route('login') }}">Logout</a>
        </div>
    </li>
  </ul>
</div>
</nav>
