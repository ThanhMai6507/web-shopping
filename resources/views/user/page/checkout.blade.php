@extends("layouts.user.userlayout")
@section('content')

    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">
                <h1>Trang Thanh Toán </h1>

                <?php
                $content = Cart::content();
                // dd($content);
                ?>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                {{-- coupon --}}

                @if(Session::get('coupon'))
                   
                        @foreach(Session::get('coupon') as $key => $cou)

                            @if($cou['coupon_condition'] == 1)
                                {{-- Mã giảm : {{$cou['coupon_number']}} % --}}
                                {{-- <p> --}}
                                    @php 
                                    $tong  =Cart::priceTotal(0, ',', '.');
                                    // echo $tong;
                                    $total_coupon = ( ($tong * 1000) * $cou['coupon_number']) /100;
                                    // echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'VND</li></p>';
                                    @endphp
                                {{-- </p> --}}

                                {{-- <p><li>Tổng đã giảm :{{ ($tong * 1000) - $total_coupon }}đ</li></p> --}}

                            @elseif($cou['coupon_condition'] == 2)
                                {{-- Mã giảm :{{$cou['coupon_number']}} k --}}
                                {{-- <p> --}}
                                    @php 
                                    $tong  =Cart::priceTotal(0, ',', '.');
                                    // echo $tong;
                                    $total_coupon = ( ($tong * 1000) - $cou['coupon_number']) ;
                                    // echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
                                    @endphp
                                {{-- </p> --}}
                                {{-- <p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li></p> --}}
                            @endif
                        @endforeach
                    
                 @endif 

                    
                {{-- end coupon --}}

                <form method="POST" action="{{ url('/save-order') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Tên người nhận </label>

                        <div class="col-md-6">
                            <input name="order_name" type="text" class="form-control" value="{{ old('order_name') }}" />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Số điện thoại </label>

                        <div class="col-md-6">
                            <input name="order_phone" type="text" class="form-control"
                                value="{{ old('order_phone') }}" />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Địa Chỉ </label>

                        <div class="col-md-6">
                            <input name="order_adds" type="text" class="form-control" value="{{ old('order_adds') }}" />

                        </div>
                    </div>
                    <h5>Phương Thức Thanh Tooán</h5>
                    <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" name="bankdef" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Thanh Toán Khi Nhận Hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="2" type="radio" name="bankdef" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Chuyển Khoảng
                        </label>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {{-- <input name="productId" type="hidden" value="{{$new -> id}}" />
                            <input name="productId" type="hidden" value="{{$new -> id}}" />--}}
                            @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition'] == 1)
                                    <input name="coupon_price" type="hidden" value=" {{ (($tong * 1000) - $total_coupon) }} " /> 
                                    @elseif($cou['coupon_condition'] == 2)
                                    <input name="coupon_price" type="hidden" value=" {{ $total_coupon}} " /> 
                                   
                                    @endif
                                @endforeach
                            @endif 
                            <button type="submit" class="btn btn-primary">
                                Đặt Hàng
                            </button>
                        </div>
                    </div>
                </form>

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
                                    <p>Giá : {{ number_format($cart->price) . ' ' . 'VND' }}</p>
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
                <a class="continue" href="#">Tiếp Tục Mua Sắm</a>
                <div class="price-details">
                    <h3>Chi tiết giá cả</h3>
                    <span>Toàn bộ</span>
                    @if (Cart::count() > 0)
                        <span>
                            {{ Cart::priceTotal(0, ',', '.') }} VND
                        </span>
                    @endif

                    <span>Mã Giảm Giá </span>
                    <span class="total1">
                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                @if($cou['coupon_condition'] == 1)
                                    {{$cou['coupon_number']}} % 
                                @elseif($cou['coupon_condition'] == 2)
                                    {{number_format($cou['coupon_number'],0,',','.')}} VND 
                                @endif
                            @endforeach
                        @endif 
                    </span>
                    <span>Tiền Giảm</span>
                    <span class="total1">

                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                @if($cou['coupon_condition'] == 1)
                                    {{number_format($total_coupon,0,',','.')}} VND
                                @elseif($cou['coupon_condition'] == 2)
                                    {{number_format($total_coupon,0,',','.')}} VND
                                @endif
                            @endforeach
                        @endif 

                    </span>
                    <div class="clearfix"></div>
                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>Tổng Tiền </h4>
                    </li>
                    <li class="last_price">
                        {{-- @if (Cart::count() > 0)
                            <span>
                               {{Cart::priceTotal()}}
                                {{ Cart::priceTotal(0, ',', '.') }} VND
                            </span>
                        @endif --}}
                        
                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                @if($cou['coupon_condition'] == 1)
                                {{number_format( (($tong * 1000) - $total_coupon)),0,',','.' }} VND
                                @elseif($cou['coupon_condition'] == 2)
                                {{number_format($total_coupon,0,',','.')}} VND
                                @endif
                            @endforeach
                        @endif 

                    </li>
                    <div class="clearfix"></div>

                    <form action="{{ url('check-coupon') }}" method="post">
                        @csrf
                        <div class="total-item">
                            <h3>Mã Giảm Giá</h3>
                            <input type="text" name="coupon" value="{{ old('coupon') }}" class="form-control">
                            <br />
                            <button type="submit" class="cpns">Áp Dụng Mã Giảm</button>
                        </div>
                    </form>

                    <div class="clearfix"> </div>
                </ul>



                <div class="clearfix"></div>
                {{-- <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div> --}}
            </div>
        </div>
    </div>
@endsection
