@extends("layouts.user.userlayout")
@section('content')

<div class="container">
	<div class="check">	 
		<div class="col-md-9 cart-items">
			 <h1>Giỏ Hàng Của Bạn </h1>
             <?php 
             $content = Cart::content();
            // dd($content);
             ?>
				<script>$(document).ready(function(c) {
					$('.close').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
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
               @foreach ($content as $key => $cart)
                <div class="cart-header">
                    <a href="{{url('delete-cart/'.$cart -> rowId)}}" class="close1" ></a>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                                <img src="{{asset('public/uploads/product/'.$cart -> options -> image)}}" class="img-responsive" alt="">
                        </div>
                        <div class="cart-item-info">
                        <h3><a href="#">{{$cart -> name }}</a><span> </span></h3>
                        <ul class="qty">
                            {{-- <li><p>Size : 5</p></li> --}}
                            <form method="post" action="{{url('/update-cart-quantity')}}">
                                @csrf
                                <li>
                                    <p>Qty :<input name="cart_quantity" value="{{$cart -> qty}} "style="width: 25px;" ></p><br/>
                                    <input type="hidden" value="{{$cart -> rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="Cập Nhập" name="update_qty" class="btn btn-checked">
                                </li>
                            </form>
                        </ul>
                        <div class="delivery">
                            @php
                                $subtotal = $cart -> price * $cart ->qty;
                            @endphp
                                <p>Giá : {{number_format($cart -> price).' '.'VND'}}</p>
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
				 <span class="total1">{{number_format($subtotal).' '.'VND'}}    </span>
				 <span>Chiết khấu</span>
				 <span class="total1">---</span>
				 <span>Phí vận chuyển</span>
				 <span class="total1">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>Tổng Tiền </h4></li>	
			   <li class="last_price">
                   <span>
                    {{number_format($subtotal).' '.'VND'}}    
                    </span>
                </li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="#">Đặt Hàng </a>
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