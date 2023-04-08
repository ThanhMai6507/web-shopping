@extends('layouts.user')
@push('search')
    <x-search>
        <x-slot:slot>
        <select class="form-select" style="width: 10rem; height: 38px; border-radius: 4px; padding: 5px 40px 5px 5px;" name='category_id'>
            <option value="">Select Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : ''}}>
                        {{$category->id}}. {{ $category->name }}
                    </option>
                @endforeach
        </select>
        </x-slot:slot>
    </x-search>
@endpush

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
                <div class="colors-large" style="margin-bottom:0">
                    <ul>
                        @foreach($product->colors as $color)
                            <li> {{ $color }}</li>
                        @endforeach    
                    </ul> 
                </div>

                <h3>SIZE</h3>
                <div class="sizes-large" style="margin-bottom:0">  
                    <ul>
                        @foreach($product->sizes as $size)
                            <li> {{ $size }}</li>
                        @endforeach    
                    </ul>  
                </div>
                
                <button class="add-cart-large">Add To Cart</button>                          
                            
            </div>
            <div class="make3D">
                <div class="product-front" style="position:relative;">
                    <div class="shadow" style="position:absolute; margin:auto"></div>
                        @if ($product->attachment) 
                            <img class="img-fluid" src="{{ asset('storage/attachments/'.$product->attachment->file_name) }} ?? null">
                        @else
                            <img src="https://perspectives.agf.com/wp-content/plugins/accelerated-mobile-pages/images/SD-default-image.png" style='display:block; width:100%; height: 100%; object-fit: cover '>
                        @endif 
                    <div class="image_overlay"></div>
                    <a class="add_to_cart" href="{{ route('add.to.cart', $product->id) }}">Add to cart</a>
                    <div class="view_gallery">View gallery</div>                
                    <div class="stats">        	
                        <div class="stats-container" style="width: 100%">
                            <span class="product_price">{{ $product->price }}</span>
                            <span class="product_name">{{ $product->name }}</span>    
                            <p>{{ $product->category->name }}</p>                                            
                            
                            <div class="product-options">
                                <div>
                                    <strong style="margin-right: 10px">SIZES</strong>
                                    @foreach($product->sizes as $size)
                                        <span style="display: inline-block; margin-left: -5px; margin-right: 10px">{{ $size->name }}</span>
                                    @endforeach 
                                </div>
                                <div>
                                    <strong style="margin-right: 10px">COLORS</strong>
                                    <div class="colors">
                                    @foreach($product->colors as $color)
                                        <span style="display: inline-block; margin-left: -5px; margin-right: 10px">{{ $color->name }}</span>
                                    @endforeach 
                                </div>
                            </div>
                        </div>                       
                        </div>                         
                    </div>
                </div>
                
                <div class="product-back">
                    <div class="shadow"></div>
                    <div class="carousel">
                        <ul class="carousel-container" style="padding: 0">
                            @if ($product->attachment) 
                                <li><img class="img-fluid" src="{{ asset('storage/attachments/'.$product->attachment->file_name) }} ?? null"></li>
                            @else
                                <li><img src="https://perspectives.agf.com/wp-content/plugins/accelerated-mobile-pages/images/SD-default-image.png" style='display:block; width:100%; height: 100%; object-fit: cover '></li>
                            @endif 
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
    <br>
    {{ $products->appends(request()->all())->links() }}
</div>
@endsection