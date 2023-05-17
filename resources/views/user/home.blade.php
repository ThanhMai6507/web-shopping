@extends("layouts.user.userlayout")
@section('content')
    <div class="content_top">
        <div class="content_bottom">
            <h3 class="m_1"> Product </h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section group">
                            @foreach ($product as $key => $sanpham)
                                <div class="col_1_of_3 simpleCart_shelfItem">
                                    <form>
                                        @csrf
                                        <div class="shop-holder">
                                            <div class="product-img">
                                                <a href="{{ url('san-pham/' . $sanpham->slug_product) }}">
                                                    <img width="225" height="265"
                                                         style="min-height: 265px"
                                                         src="{{ asset('public/uploads/product/' . $sanpham->img_product) }}"
                                                         class="img-responsive" alt="item4"></a>
                                                <input type="button" class="button item_add add-to-cart"
                                                       data-id_product="{{$sanpham->id}}" name="add-to-cart">
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{$sanpham->id}}"
                                               class="cart_product_id_{{$sanpham->id}}">
                                        <input type="hidden" value="{{$sanpham->name_product}}"
                                               class="cart_product_name_{{$sanpham->id}}">
                                        <input type="hidden" value="{{$sanpham->img_product}}"
                                               class="cart_product_image_{{$sanpham->id}}">
                                        <input type="hidden" value="{{$sanpham->price}}"
                                               class="cart_product_price_{{$sanpham->id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$sanpham->id}}">

                                    </form>
                                    {{-- cart ajax --}}
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
        </div>
    </div>
@endsection
