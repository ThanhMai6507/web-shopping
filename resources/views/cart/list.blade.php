@extends('layouts.layout-user')
@push('search')
    <x-search>
        <x-slot:slot>
            <select class="form-select"
                    style="width: 10rem; height: 38px; border-radius: 4px; padding: 5px 40px 5px 5px;"
                    name='category_id'>
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
    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div id="grid">
            @foreach($products as $product)
                <div class="product">
                    <div class="info-large">
                        <h4>{{ $product->name }}</h4>
                        <div class="price-big">
                            <span>$43</span> $39
                        </div>
                        <h3>COLORS</h3>
                        <div class="colors-large">
                            <ul>
                                @foreach($product->colors as $color)
                                    <li> {{ $color }}</li>
                                @endforeach
                                @if(!empty($product->colors))
                                    @foreach($product->sizes as $size)
                                        <span>{{ $size }}</span>
                                    @endforeach
                                @else
                                    <li><a href style="background:#222"><span></span></a></li>
                                    <li><a href style="background:#6e8cd5"><span></span></a></li>
                                    <li><a href style="background:#f56060"><span></span></a></li>
                                    <li><a href style="background:#44c28d"><span></span></a></li>
                                @endif
                            </ul>
                        </div>
                        <h3>SIZE</h3>
                        <div class="sizes-large">
                            @if(!empty($product->sizes))
                                @foreach($product->sizes as $size)
                                    <span>{{ $size }}</span>
                                @endforeach
                            @else
                                <span>XS</span>
                                <span>S</span>
                                <span>M</span>
                                <span>L</span>
                                <span>XL</span>
                                <span>XXL</span>
                            @endif
                        </div>
                        <button class="add-cart-large">Add To Cart</button>
                    </div>
                    <div class="make3D">
                        <div class="product-front">
                            <div class="shadow"></div>
                            @if ($product->attachment)
                                <img src="{{ asset('storage/attachments/'.$product->attachment->file_name) }}"/>
                            @else
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1.jpg"/>
                            @endif
                            <div class="image_overlay"></div>
                            <div class="add_to_cart">Add to cart</div>
                            <input type="hidden" value="{{ $product->id }}" id="product___id">
                            <div class="view_gallery">View gallery</div>
                            <div class="stats">
                                <div class="stats-container">
                                    <span class="product_price">{{ $product->price }}</span>
                                    <a href="{{ route('cart.detail.product', $product->id) }}"
                                       style="color: black;text-decoration: none;">
                                        <span class="product_name">{{ $product->name }}</span>
                                    </a>
                                    <p>{{ $product->category->name }}</p>
                                    <div class="product-options">
                                        <strong>SIZES</strong>
                                        <span>XS, S, M, L, XL, XXL</span>
                                        <strong>COLORS</strong>
                                        <div class="colors">
                                            <div class="c-blue"><span></span></div>
                                            <div class="c-red"><span></span></div>
                                            <div class="c-white"><span></span></div>
                                            <div class="c-green"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('pagination')
    {{ $products->appends(request()->all())->links('pagination::default') }}
@endsection
