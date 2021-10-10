@extends("layouts.user.userlayout")
@section('content')

    <div class="banner">
        <div class="container">
            <div class="banner_desc">
                <h1>New Season Arrivals.</h1>
                <h2>Check out all the new trends</h2>
                <div class="button">
                    <a href="#" class="hvr-shutter-out-horizontal">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content_top">
        <h3 class="m_1">Hàng Vừa Về</h3>
        <div class="container">
            <div class="box_1">
                <div class="col-md-7">
                    <div class="section group">

                        @foreach ($product_new as $key => $new)
                            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                                <form action="{{ url('/save-cart') }}" method="POST">
                                    @csrf
                                    <div class="shop-holder">
                                        <div class="product-img">
                                            <a href="{{ url('san-pham/' . $new->slug_product) }}">
                                                <img width="225" height="265"
                                                    src="{{ asset('public/uploads/product/' . $new->img_product) }}"
                                                    class="img-responsive" alt="item4"></a>
                                            <button type="submit" class="button item_add"></button>
                                            <input name="qty" type="hidden" value="1" />
                                            <input name="productId" type="hidden" value="{{ $new->id }}" />
                                        </div>
                                    </div>
                                </form>
                                <div class="shop-content" style="height: 80px;">
                                    <h3><a href="{{ url('san-pham/' . $new->slug_product) }}">{!! substr($new->name_product, 0, 18) !!}</a>
                                    </h3>
                                    <span class="amount item_price">{{ number_format($new->price) . ' ' . 'VND' }}</span>
                                </div>

                            </div>
                        @endforeach
                        {{-- {{$product_new ->links('pagination::bootstrap-4')}} --}}
                    </div>
                </div>
                <div class="col-md-5 row_3">
                    <div class="about-block-content">
                        <div class="border-add"></div>
                        <h4>Giới Thiệu </h4>
                        <p>Tạo cho bạn
                            một phong cách mới!</p>
                        <p>Thành công không phải lúc nào cũng là về sự vĩ đại. Đó là về tính nhất quán. Kiên trì
                        </p>
                        <p> </p>
                    </div>
                    <img src="images/pic9.jpg" class="img-responsive" alt="" />
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <div class="content_bottom">

            <h3 class="m_1"> Sản Phẩm </h3>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section group">
                            @foreach ($product as $key => $sanpham)
                                <div class="col_1_of_3 simpleCart_shelfItem">
                                    <form action="{{ url('/save-cart') }}" method="POST">
                                        @csrf
                                        <div class="shop-holder">
                                            <div class="product-img">
                                                <a href="{{ url('san-pham/' . $sanpham->slug_product) }}">
                                                    <img width="225" height="265"
                                                        src="{{ asset('public/uploads/product/' . $sanpham->img_product) }}"
                                                        class="img-responsive" alt="item4"></a>
                                                <button type="submit" class="button item_add"></button>
                                                <input name="qty" type="hidden" value="1" />
                                                <input name="productId" type="hidden" value="{{ $sanpham->id }}" />
                                            </div>
                                        </div>
                                    </form>

                                    {{-- <form >
                                       @csrf
                                        <div class="shop-holder">
                                            <div class="product-img">
                                                <a href="{{ url('san-pham/' . $sanpham->slug_product) }}">
                                                    <img width="225" height="265"
                                                        src="{{ asset('public/uploads/product/' . $sanpham->img_product) }}"
                                                        class="img-responsive" alt="item4"></a>
                                                <button name="add-to-cart" type="button" data-id_product="{{ $sanpham->id}}" class="button item_add add-to-cart"></button>
                                                <input type="hidden" value="{{ $sanpham->id }}" class="cart_product_id_{{ $sanpham->id }}">
                                                <input name="qty" type="hidden" value="1" />

                                            </div>
                                        </div>
                                    </form> --}}

                                    <div class="shop-content" style="height: 80px; ">
                                        <a href="{{ url('san-pham/' . $sanpham->slug_product) }}"
                                            style="text-align: center; font-size: 14px;">{!! substr($sanpham->name_product, 0, 18) !!}</a>
                                        <div><a href="{{ url('san-pham/' . $sanpham->slug_product) }}" rel="tag"
                                                style="font-size: 12px;"></a></div>
                                        <span
                                            class="amount item_price">{{ number_format($sanpham->price) . ' ' . 'VND' }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{ $product->links('pagination::bootstrap-4') }}
                    <div class="clearfix"></div>
                </div>


            </div>


            {{-- <div class="content_top">
	<h3 class="m_1">Latest Products</h3>
	<div class="container">
        <div class="row">
                <div class="col-md-7">
                        <div class="section group">
                                <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                                    <div class="shop-holder">
                                        <div class="product-img">
                                            <a href="single.html">
                                                <img width="225" height="265" src="{{ asset('public/User/images/pic1.jpg') }}" class="img-responsive"  alt="item4"></a>
                                            <a href="" class="button item_add"></a>		                         </div>
                                    </div>
                                    <div class="shop-content" style="height: 80px;">
                                            <div><a href="single.html" rel="tag">humour</a></div>
                                            <h3><a href="single.html">Non-charac</a></h3>
                                    </div>
                                </div>
                                <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                                    <div class="shop-holder">
                                        <div class="product-img">
                                            <a href="single.html">
                                                <img width="225" height="265" src="{{ asset('public/User/images/pic1.jpg') }}" class="img-responsive"  alt="item4"></a>
                                            <a href="" class="button item_add"></a>		                         </div>
                                    </div>
                                    <div class="shop-content" style="height: 80px;">
                                            <div><a href="single.html" rel="tag">humour</a></div>
                                            <h3><a href="single.html">Non-charac</a></h3>
                                            <span class="amount item_price">$45.00</span>
                                    </div>
                                </div>
                                <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem ">
                                    <div class="shop-holder">
                                        <div class="product-img">
                                            <a href="single.html">
                                                <img width="225" height="265" src="{{ asset('public/User/images/pic1.jpg') }}" class="img-responsive"  alt="item4"></a>
                                        <a href="" class="button item_add"></a>	                         </div>
                                    </div>
                                    <div class="shop-content" style="height: 80px;">
                                            <div><a href="single.html" rel="tag">humour</a></div>
                                            <h3><a href="single.html">Non-charac simpleCart_shelfItemsimpleCart_shelfItemhumourhumourhumour</a></h3>
                                            <span class="amount item_price">$45.00</span>
                                    </div>
                                </div>
                                <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                                    <div class="shop-holder">
                                        <div class="product-img">
                                            <a href="single.html">
                                                <img width="225" height="265" src="{{ asset('public/User/images/pic1.jpg') }}" class="img-responsive"  alt="item4"></a>
                                            <a href="" class="button item_add"></a>		                         </div>
                                    </div>
                                    <div class="shop-content" style="height: 80px;">
                                            <div><a href="single.html" rel="tag">humour</a></div>
                                            <h3><a href="single.html">Non-charac</a></h3>
                                            <span class="amount item_price">$45.00</span>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



@endsection
