@extends("layouts.user.userlayout")
@section('content')


    <div class="single_top">
        <div class="container">
            <div class="single_grid">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        <li>
                            <img class="etalage_thumb_image"
                                src="{{ asset('public/uploads/product/' . $product->img_product) }}"
                                class="img-responsive" />
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h1>{{ $product->name_product }}</h1>
                    <p>{{ $product->description }}</p>
                    {{-- <div class="dropdown_top">
                      <div class="dropdown_left">
                          
                        <select id=" productsize" class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro1"}'>
                           <option value="0">Select size</option>	
                           <option value="M">M</option>
                           <option value="L">L</option>
                           <option value="XL">XL </option>
                           <option value="FS">Fs</option>
                           <option value="S">S </option>
                        </select>
                      </div>
                       <ul class="color_list">
                           <li><a href="#"> <span class="color1"> </span></a></li>
                           <li><a href="#"> <span class="color2"> </span></a></li>
                           <li><a href="#"> <span class="color3"> </span></a></li>
                           <li><a href="#"> <span class="color4"> </span></a></li>
                           <li><a href="#"> <span class="color5"> </span></a></li>
                       </ul>
                        <div class="clearfix"></div>
                    </div> --}}
                    <div class="simpleCart_shelfItem">
                        <div class="price_single">
                            <div class="head">
                                <h3><span
                                        class="amount item_price">{{ number_format($product->price) . ' ' . 'VND' }}</span>
                                </h3>
                            </div>
                            <div class="head_desc"><a href="#"></a><img src="images/review.png" alt="" /></li>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form action="{{ url('/save-cart') }}" method="POST">
                            @csrf
                            <input name="productSize" type="hidden" value="1" />
                            <input name="qty" type="hidden" value="1" />
                            <input name="productId" type="hidden" value="{{ $product->id }}" />
                            <button class="btn btn-primary" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <div class="single_social_top">
        <ul class="single_social">
            <li><a href="#"> <i class="s_fb"> </i>
                    <div class="social_desc">Share<br> on facebook</div>
                    <div class="clearfix"> </div>
                </a></li>
            <li><a href="#"> <i class="s_twt"> </i>
                    <div class="social_desc">Tweet<br> this product</div>
                    <div class="clearfix"> </div>
                </a></li>
            <li><a href="#"> <i class="s_google"> </i>
                    <div class="social_desc">Google+<br> this product</div>
                    <div class="clearfix"> </div>
                </a></li>
            <li class="last"><a href="#"> <i class="s_email"> </i>
                    <div class="social_desc">Email<br> a Friend</div>
                    <div class="clearfix"> </div>
                </a></li>
        </ul>
    </div>
    <h3 class="m_2">Chi Tiết Sản Phẩm </h3>
    <div class="container">
        <div class="box_3">
            <p> {!! $product->detail !!} </p>
        </div>
    </div>
    <h3 class="m_2">Sản Phẩm Liên Quan </h3>
    <div class="container">
        <div class="row">
            @foreach ($related_products as $item)
                <div class="col-md-4">
                    <a href=" {{ url('san-pham/' . $item->slug_product) }}">
                        <div class="card mb-4 box-shadow">
                            <img src="{{ asset('public/uploads/product/' . $item->img_product) }}" class="card-img-top"
                                data-holder-rendered="true" style="height: 314px; width: 218px%; display: block;">
                    </a>
                    <div class="card-body">
                        <a href="{{ url('san-pham/' . $item->slug_product) }}">
                            <p class="card-text">
                                <h4>{{ $item->name_product }}</h4>
                            </p>
                        </a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
    </div>
@endsection
