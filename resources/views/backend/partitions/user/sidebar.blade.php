
<a style="color: #262626; font-weight: bold; text-decoration: none" href="{{ url('cart/show') }}">CART</a>
@if (!request()->is('cart/show'))
    @php
        $carts = App\Models\Cart::with(['user', 'product.attachment'])->where('user_id', auth()->id())->get();
    @endphp
    <div id="cart">
        @if (isset($carts))
            @foreach($carts as $cart)
                <div class="cart-item">
                    <div class="img-wrap"><img
                            src="{{ asset('storage/attachments/'.$cart->product->attachment?->file_name) }}"
                            alt=""></div>
                    <span>{{ $cart->product->name }}</span>
                    <strong>{{ $cart->product->price }}</strong>
                    <div class="cart-item-border"></div>
                    <div class="delete-item"></div>
                </div>
            @endforeach
        @else
            <br>
            <span class="empty">No items in cart.</span>
        @endif
    </div>

@endif
