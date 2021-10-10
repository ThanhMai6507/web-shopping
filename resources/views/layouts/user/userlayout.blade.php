<!DOCTYPE HTML>
<html>

<head>
    <title> {{ $meta_title }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- SEO --}}
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="{{ $url_canonical }}" />
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="" />
    {{-- end seo --}}
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{ asset('public/User/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="{{ asset('public/User/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/User/css/sweetalert.css') }}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('public/User/js/simpleCart.min.js') }}"> </script>
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet'
        type='text/css'>
    <script type="text/javascript" src="{{ asset('public/User/js/jquery-1.11.1.min.js    ') }}"></script>
    <!-- start menu -->
    <link href="{{ asset('public/User/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('public/User/js/megamenu.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".megamenu").megamenu();
        });
    </script>
</head>

<body>
    <div class="header_top">
        <div class="container">
            <div class="one-fifth column row_1">
                <a> Số điện thoại </a>
            </div>
            <div class="cssmenu">
                <ul>
                    @if (Auth::check())
                        <li class="active">
                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div></a>
                        </li>
                    @else
                        <li class="active"><a href="{{ url('/user-register') }}">Đăng Kí</a></li>
                        <a>|</a>
                        <li class="active"><a href="{{ url('/user-login') }}">Đăng Nhập</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="header_bottom men_border">
        <div class="container">
            <div class="col-xs-8 header-bottom-left">
                <div class="col-xs-2 logo">
                    <h1><a href="{{ url('/') }}"><span>Buy</span>shop</a></h1>
                </div>
                <div class="col-xs-6 menu">
                    <ul class="megamenu skyblue">
                        <li><a class="color1" href="{{ url('/') }}">Trang Chủ </a>
                        </li>
                        <li class="grid"><a class="color2" href="#">Danh Mục Sản Phẩm</a>
                            <div class="megapanel">
                                <div class="row">
                                    <div class="col1">
                                        <div class="h_nav">
                                            <ul>
                                                @foreach ($category as $key => $muc)
                                                    <li><a
                                                            href="{{ url('danh-muc/' . $muc->slug_category) }}">{{ $muc->category_name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a class="color4" href="#"> Giới Thiệu </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-4 header-bottom-right">
                <div class="box_1-cart">
                    <div class="box_11"><a href="{{ url('/show-cart') }}">
                            <input type="hidden" @php
                                $cart_info = Cart::content();
                            @endphp @foreach ($cart_info as $caif)
                            {{ $caif->price }}
                            @php
                                $subtotal = $caif->price * $caif->qty;
                            @endphp
                            @endforeach
                            />
                            <h4>
                                @if (Cart::count() > 0)
                                    <p>Cart: {{ number_format($subtotal) . ' ' . 'VND' }} (<span
                                            id="simpleCart_quantity">{{ Cart::count() }} </span> items)</p><img
                                        src="images/bag.png" alt="" />
                                    <div class="clearfix"> </div>
                            </h4>
                        @else
                            <p>Cart: 0 <div class="clearfix"> </div>
                                </h4>
                                @endif

                        </a></div>
                    <div class="clearfix"> </div>
                </div>
                <form autocomplete="off" action="{{ url('tim-kiem') }}" method="post">
                    @csrf
                    <div class="search">
                        <input type="text" placeholder="Bạn cần tìm gì ?" id="keywords" name="tukhoa"
                            class="textbox">
                        <input type="submit" value="Subscribe" id="submit" name="submit">
                        <div id="search_ajax"></div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>



    @yield('content')

    <div class="footer">
        <div class="container">
            <div class="footer_top">
                <div class="col-md-4 box_3">
                    <h3>Our Stores</h3>
                    <address class="address">
                        <p>9870 St Vincent Place, <br>Glasgow, DC 45 Fr 45.</p>
                        <dl>
                            <dt></dt>
                            <dd>Freephone:<span> +1 800 254 2478</span></dd>
                            <dd>Telephone:<span> +1 800 547 5478</span></dd>
                            <dd>FAX: <span>+1 800 658 5784</span></dd>
                            <dd>E-mail:&nbsp; <a href="mailto@example.com">info(at)buyshop.com</a></dd>
                        </dl>
                    </address>
                    <ul class="footer_social">
                        <li><a href=""> <i class="fb"> </i> </a></li>
                        <li><a href=""><i class="tw"> </i> </a></li>
                        <li><a href=""><i class="google"> </i> </a></li>
                        <li><a href=""><i class="instagram"> </i> </a></li>
                    </ul>
                </div>
                <div class="col-md-4 box_3">
                    <h3>Blog Posts</h3>
                    <h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
                    <h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
                    <h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
                </div>
                <div class="col-md-4 box_3">
                    <h3>Support</h3>
                    <ul class="list_1">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Payment</a></li>
                        <li><a href="#">Refunds</a></li>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Services</a></li>
                    </ul>
                    <ul class="list_1">
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="footer_bottom">
                <div class="copy">
                    <p>Copyright © Phạm Việt Khánh <a href="#" target="_blank"></a> </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- gio hang ajax --}}
    {{-- <script type="text/javascript" src="{{ asset('public/User/js/sweetalert.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_'+id).val();
                var _token = $('input[name = "_token"]').val();
                $.ajax({
                    url:"{{ url('/save-cart')}}",
                    method:"post",
                    data:{productId:id,_token:_token}
                    swal("Hello world!");
                })
            })
        })

    </script> --}}
    {{-- gio hang ajax --}}
    {{-- Tim kiem ajax --}}
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var keywords = $(this).val();
            if (keywords != '') {
                var _token = $('input[name = "_token"]').val();
                $.ajax({
                    url: "{{ url('/timkiem-ajax') }}",
                    method: "post",
                    data: {
                        keywords: keywords,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                })
            } else {
                $('#seach_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_timkiem_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    {{-- end tim kiem ajax --}}


</body>

</html>
