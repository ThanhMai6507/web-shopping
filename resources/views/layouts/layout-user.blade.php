<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Laravel </title>
    <link rel="stylesheet" href="{{ asset('/css/layout-user.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-80520768-2"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('css')
</head>

<body style="">
    <div id="wrapper">
        <div class="cart-icon-top">
        </div>
        <div class="cart-icon-bottom">
        </div>
        <div id="checkout">
            <a style="color: #262626; font-weight: bold; text-decoration: none"
                href="{{ url('cart/show') }}">CHECKOUT</a>
        </div>

        <div id="info">
            @stack('search')
        </div>
        <div id="header">
            <ul>
                <li><a href="{{ route('show.list') }}">Home</a></li>
                <li><a href>BRANDS</a></li>
                <li><a href>DESIGNERS</a></li>
                <li><a href>CONTACT</a></li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form-user').submit();">
                                LOGOUT
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">ACCOUNT</a>
                        </li>
                    @endauth
                    <form id="logout-form-user" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>
        <div id="sidebar">
            <h3>
                <a style="color: #262626; font-weight: bold; text-decoration: none"
                    href="{{ url('cart/show') }}">CART</a>
            </h3>
            <div id="cart">
                @if (!request()->is('cart/show'))
                    @php
                        $carts = App\Models\Cart::with(['user', 'product.attachment'])
                            ->where('user_id', auth()->id())
                            ->get();
                    @endphp
                    <div id="cart">
                        @if (isset($carts))
                            @foreach ($carts as $cart)
                                <div class="cart-item">
                                    <div class="img-wrap"><img
                                            src="{{ asset('storage/attachments/' . $cart->product->attachment?->file_name) }}"
                                            alt=""></div>
                                    <span>{{ $cart->product->name }}</span>
                                    <strong>{{ $cart->product->price }}</strong>
                                    <div class="cart-item-border"></div>
                                    <div class="delete-item"></div>
                                </div>
                            @endforeach
                        @else
                            <span class="empty">No items in cart.</span>
                        @endif
                    </div>
                @endif
            </div>
            <h3>CATEGORIES</h3>
            <div class="checklist categories">
                <ul>
                    <li><a href><span></span>New Arivals</a></li>
                    <li><a href><span></span>Accesories</a></li>
                    <li><a href><span></span>Bags</a></li>
                    <li><a href><span></span>Dressed</a></li>
                    <li><a href><span></span>Jackets</a></li>
                    <li><a href><span></span>jewelry</a></li>
                    <li><a href><span></span>Shoes</a></li>
                    <li><a href><span></span>Shirts</a></li>
                    <li><a href><span></span>Sweaters</a></li>
                    <li><a href><span></span>T-shirts</a></li>
                </ul>
            </div>
            <h3>COLORS</h3>
            <div class="checklist colors">
                <ul>
                    <li><a href><span></span>Beige</a></li>
                    <li><a href><span style="background:#222"></span>Black</a></li>
                    <li><a href><span style="background:#6e8cd5"></span>Blue</a></li>
                    <li><a href><span style="background:#f56060"></span>Brown</a></li>
                    <li><a href><span style="background:#44c28d"></span>Green</a></li>
                </ul>
                <ul>
                    <li><a href><span style="background:#999"></span>Grey</a></li>
                    <li><a href><span style="background:#f79858"></span>Orange</a></li>
                    <li><a href><span style="background:#b27ef8"></span>Purple</a></li>
                    <li><a href><span style="background:#f56060"></span>Red</a></li>
                    <li><a href><span
                                style="background:#fff;border: 1px solid #e8e9eb;width:13px;height:13px;"></span>White</a>
                    </li>
                </ul>
            </div>
            <h3>SIZES</h3>
            <div class="checklist sizes">
                <ul>
                    <li><a href><span></span>XS</a></li>
                    <li><a href><span></span>S</a></li>
                    <li><a href><span></span>M</a></li>
                </ul>
                <ul>
                    <li><a href><span></span>L</a></li>
                    <li><a href><span></span>XL</a></li>
                    <li><a href><span></span>XXL</a></li>
                </ul>
            </div>
            <h3>PRICE RANGE</h3>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/price-range.png" alt />
        </div>
        @yield('content')
    </div>
    <div style="
              margin-top: 25px;
    ">
        <div style="display:block">
            <div class="box--pagination">
                @yield('pagination')
            </div>
            <footer class="credit">Nguyen Thanh Mai</footer>
        </div>

    </div>


    <script src="{{ asset('/js/js-layout-user.js') }}"></script>

    <script src="{{ asset('/js/rocket-loader.min.js') }}" defer></script>
</body>

</html>
