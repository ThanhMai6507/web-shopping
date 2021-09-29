@extends("layouts.user.userlayout")
@section('content')


<div class="single_top">
    <div class="container"> 
         <div class="single_grid">
               <div class="grid images_3_of_2">
                       <ul id="etalage">
                           <li>
                               <img class="etalage_thumb_image" src="{{asset('public/uploads/product/'.$product -> img_product)}}" class="img-responsive"  />
                           </li>
                       </ul>
                      <div class="clearfix"></div>		
                 </div> 
                 <div class="desc1 span_3_of_2">
                   <h1>{{$product -> name_product}}</h1>
                   <p>{{$product ->description}}</p>
                    <div class="dropdown_top">
                      <div class="dropdown_left">
                        <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro1"}'>
                           <option value="0">Select size</option>	
                           <option value="1">M</option>
                           <option value="2">L</option>
                           <option value="3">XL </option>
                           <option value="4">Fs</option>
                           <option value="5">S </option>
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
                    </div>
                    <div class="simpleCart_shelfItem">
                        <div class="price_single">
                         <div class="head"><h3><span class="amount item_price">{{number_format($product -> price).' '.'VND'}}</span></h3></div>
                         <div class="head_desc"><a href="#"></a><img src="images/review.png" alt=""/></li></div>
                          <div class="clearfix"></div>
                        </div>
                         <div class="size_2-right"><a href="#" class="item_add item_add1 btn_5" value="">Add to Cart </a></div>
                     
                    </div>
               </div>
                 <div class="clearfix"></div>
                </div>
            </div>

  </div>
    {{-- <h3 class="m_2">Sản Phẩm Liên Quan </h3>
            <div class="container">
                    
                    <div class="box_3">
                        @foreach ( $options_Product as $key => $sanphamlienquan)
                        <div class="col-md-3">
                            <div class="content_box"><a href="single.html">
                                <img src="images/pic2.jpg" class="img-responsive" alt="">
                            </div>
                        <h4><a href="single.html">Contrary to popular belief</a></h4>
                        <p>$ 199</p>
                        </div>
                        <div class="clearfix"> </div>
                        
                    </div>
                   
                   
            </div> --}}
</div>
@endsection
