@extends("layouts.user.userlayout")
@section('content')

    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">
                @if (Cart::count() > 0)
                    <h1>Giỏ Hàng Của Bạn </h1>
                @else
                    <h1>Giỏ Hàng Của Bạn Hiện Đang Trống </h1>
                @endif

                <?php
                $content = Cart::content();
                $items = Cart::count();
                // dd($content);
                ?>
                <script>
                    $(document).ready(function(c) {
                        $('.close').on('click', function(c) {
                            $('.cart-header').fadeOut('slow', function(c) {
                                $('.cart-header').remove();
                            });
                        });
                    });
                </script>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                {{-- @php
                    $subtotal1  = 0;
                 @endphp --}}
                @foreach ($content as $key => $cart)
                    <div class="cart-header">
                        <a href="{{ url('delete-cart/' . $cart->rowId) }}" class="close1"></a>
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{ asset('public/uploads/product/' . $cart->options->image) }}"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="cart-item-info">
                                <h3><a href="#">{{ $cart->name }}</a><span> </span></h3>
                                <ul class="qty">
                                    {{-- <li><p>Size : 5</p></li> --}}
                                    <form method="post" action="{{ url('/update-cart-quantity') }}">
                                        @csrf
                                        <li>
                                            <p>Qty :<input name="cart_quantity" value="{{ $cart->qty }} "
                                                    style="width: 25px;"></p><br />
                                            <input type="hidden" value="{{ $cart->rowId }}" name="rowId_cart"
                                                class="form-control">
                                            <input type="submit" value="Cập Nhập" name="update_qty" class="btn btn-checked">
                                        </li>
                                    </form>
                                </ul>
                                <div class="delivery">
                                    @php
                                        $subtotal = $cart->price * $cart->qty;
                                    @endphp
                                    <p>Giá : {{ number_format($cart->price, 0, ',', '.') . ' ' . 'VND' }}</p>
                                    {{-- <span>Delivered in 2-3 bussiness days</span> --}}
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach





            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ url('/') }}">Tiếp Tục Mua Sắm</a>
                <div class="price-details">
                    <h3>Chi tiết giá cả</h3>
                    <span>Toàn bộ</span>

                    @if (Cart::count() > 0)
                        <span class="total1"> {{ Cart::priceTotal(0, ',', '.') }} VND </span>
                    @endif

                    <span>Chiết khấu</span>
                    <span class="total1">---</span>
                    <span>Phí vận chuyển</span>
                    <span class="total1">---</span>
                   
                  

                    <div class="clearfix"></div>


                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>Tổng Tiền </h4>
                    </li>
                    <li class="last_price">
                        @if (Cart::count() > 0)
                            <span>
                                {{ Cart::priceTotal(0, ',', '.') }} VND
                            </span>
                        @endif

                    </li>
                    <div class="clearfix"> </div>
                </ul>


                <div class="clearfix"></div>
                @if (Cart::count() > 0)
                    <a class="order" href="{{ url('/check-out') }}">Thanh Toán </a>
                @endif
              
            </div>
        </div>
    </div>
@endsection
