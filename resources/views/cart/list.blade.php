@extends('layouts.user')

@section('content')
<div id="grid">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    
    <div class="row">
        @foreach($products as $product)
        <div class="product col-12 col-md-6 col-lg-3 d-flex" style="margin-top: 20px;">
            <div class="info-large">
                <h4>{{ $product->name }}</h4>
                <div class="sku">
                    PRODUCT SKU: <strong>89356</strong>
                </div>
                
                <div class="price-big">
                    <span>$43</span> $39
                </div>
                
                <h3>COLORS</h3>
                <div class="colors-large">
                    <ul>
                        @foreach($product->colors as $color)
                            <li>Color: {{ $color }}</li>
                        @endforeach    
                    </ul> 
                </div>

                <h3>SIZE</h3>
                <div class="sizes-large">
                    @foreach($product->sizes as $size)
                        <span>Size: {{ $size }}</span>
                    @endforeach  
                </div>
                
                <button class="add-cart-large">Add To Cart</button>                          
                            
            </div>
            <div class="make3D">
                <div class="product-front">
                    <div class="shadow"></div>
                        @if ($product->attachment)
                            <img class="img-fluid" src="{{ asset('storage/attachments/'.$product->attachment->file_name) }} ?? null">
                        @endif
                    <div class="image_overlay"></div>
                    <a class="add_to_cart" href="{{ route('add.to.cart', $product->id) }}">Add to cart</a>
                    <div class="view_gallery">View gallery</div>                
                    <div class="stats">        	
                        <div class="stats-container">
                            <span class="product_price">{{ $product->price }}</span>
                            <span class="product_name">{{ $product->name }}</span>    
                            <p>{{ $product->category->name }}</p>                                            
                            
                            <div class="product-options">
                            <strong>SIZES</strong>
                                @foreach($product->sizes as $size)
                                    <span>Size: {{ $size->name }}</span>
                                @endforeach 
                            <br>
                            <strong>COLORS</strong>
                            <div class="colors">
                                @foreach($product->colors as $color)
                                    <span>Color: {{ $color->name }}</span>
                                @endforeach 
                            </div>
                        </div>                       
                        </div>                         
                    </div>
                </div>
                
                <div class="product-back">
                    <div class="shadow"></div>
                    <div class="carousel">
                        <ul class="carousel-container">
                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1.jpg" alt="" /></li>
                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/2.jpg" alt="" /></li>
                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/3.jpg" alt="" /></li>
                        </ul>
                        <div class="arrows-perspective">
                            <div class="carouselPrev">
                                <div class="y"></div>
                                <div class="x"></div>
                            </div>
                            <div class="carouselNext">
                                <div class="y"></div>
                                <div class="x"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-back">
                        <div class="cy"></div>
                        <div class="cx"></div>
                    </div>
                </div>	  
            </div>	
        </div>
        @endforeach
    </div>
</div>
@endsection