@extends("layouts.user.userlayout")
@section('content')

    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">
                @php
                    $total = 0 ;
                    $cart_ajax = Session::get('cart');
                @endphp
                @if ($cart_ajax == true)
                    <h1>Your cart</h1>
                @else
                    <h1>GYour shopping cart is currently Empty </h1>
                @endif

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{url('/update-cart-ajax')}}" method="POST">
                    @csrf
                    @foreach ($cart_ajax as $key => $cart)
                        @php
                            $subtotal = 0;
                            if(isset($cart)){
                                $subtotal = $cart['product_price']* $cart['product_qty'];
                            }
                            $total += $subtotal;
                        @endphp

                        <div class="cart-header">
                            <a href="{{url('/delete-cart-ajax/'. $cart['session_id'])}}" class="close1"></a>
                            <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                    <img src="{{ asset('public/uploads/product/' . $cart['product_image']) }}"
                                         class="img-responsive" alt="">
                                </div>
                                <div class="cart-item-info">
                                    <h3><p href="#">{{ $cart['product_name'] }}</p><span> </span></h3>
                                    <ul class="qty">
                                        @csrf
                                        <li>
                                            <p>Qty <input class="cart_quantity" type="number" min="1"
                                                          name="cart_qty[{{$cart['session_id']}}]"
                                                          value="{{$cart['product_qty']}}" style="width: 55px;"></p>
                                            <br/>
                                        </li>

                                    </ul>
                                    <div class="delivery">
                                        <p>Price : {{ number_format($subtotal, 0, ',', '.') . ' ' . 'VND' }}</p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endforeach
                    <input type="submit" value="Update cart" name="update_qty"
                           class="check_out btn btn-default btn-sm">
                </form>
            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ url('/') }}">Continue Shopping</a>
                <div class="price-details">
                    <h3>Cprice details</h3>
                    <span>Total</span>
                    <span class="total1">  VND </span>
                    <span>Discount</span>
                    <span class="total1">---</span>
                    <span>Pshipping lice</span>
                    <span class="total1">---</span>
                    <div class="clearfix"></div>
                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>Total Money </h4>
                    </li>
                    <li class="last_price">
                            <span>
                                {{ number_format($total, 0, ',', '.') . ' ' . 'VND' }}
                            </span>
                    </li>
                    <div class="clearfix"></div>
                </ul>
                <div class="clearfix"></div>
                <a class="order" href="{{ url('/check-out-ajax') }}">Pay </a>
            </div>
        </div>
    </div>
@endsection
