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
                     <h1>Giỏ Hàng Của Bạn </h1>
                    @else
                     <h1>Giỏ Hàng Của Bạn Hiện Đang Trống </h1>
                    @endif
                   
              
                    
               

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                   

            <form action="{{url('/update-cart-ajax')}}" method="POST">     
                @csrf   
                    @foreach ( $cart_ajax as $key => $cart)
                        @php
                            $subtotal = $cart['product_price']* $cart['product_qty'];
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
                                        {{-- <li><p>Size : 5</p></li> --}}
                                      
                                            @csrf
                                            <li>
                                                <p>Qty <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"   style="width: 55px;"></p><br />
                                                       
                                                {{-- <input type="hidden" value="{{ $cart->rowId }}" name="rowId_cart"
                                                    class="form-control">
                                                <input type="submit" value="Cập Nhập" name="update_qty" class="btn btn-checked"> --}}
                                            </li>
                                       
                                    </ul>
                                    <div class="delivery">
                                    
                                        <p>Giá : {{ number_format($subtotal, 0, ',', '.') . ' ' . 'VND' }}</p>
                                        {{-- <span>Delivered in 2-3 bussiness days</span> --}}
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endforeach
                
                    <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
            </form>     
               





            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ url('/') }}">Tiếp Tục Mua Sắm</a>
                <div class="price-details">
                    <h3>Chi tiết giá cả</h3>
                    <span>Toàn bộ</span>

                    
                        <span class="total1">  VND </span>
                   

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
                      
                            <span>
                                {{ number_format($total, 0, ',', '.') . ' ' . 'VND' }}
                            </span>
                      

                    </li>
                    <div class="clearfix"> </div>
                </ul>


                <div class="clearfix"></div>
               
                    <a class="order" href="{{ url('/check-out-ajax') }}">Thanh Toán </a>
               
              
            </div>
        </div>
    </div>
@endsection
