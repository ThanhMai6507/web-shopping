
<div class="d-flex header-style">
    <div class="d-flex form-header">
        <div class="d-flex">
            <div class="item-menu"><a href="{{ route('show.list') }}">HOME</a></div>
            <div class="item-menu"><a href="">BRANDS</a></div>
            <div class="item-menu"><a href="">DESIGNERS</a></div>
            <div class="item-menu"><a href="">CONTACT</a></div>
        </div>
        <div class="ml-2 form-login-style">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form-user').submit();">
                            LOGOUT
                        </a>

                        <form id="logout-form-user" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold">ACCOUNT</a>
                    @endauth
                </div>
            @endif
        </div>
        <div>
            @stack('search')
        </div>
    </div>
</div>
