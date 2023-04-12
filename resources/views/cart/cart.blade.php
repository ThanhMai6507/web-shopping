@extends('layouts.user')

@section('content')
<div class="cartList" style="width: 80%; margin-left:18%; margin-top:5%">
    <div class="container">
        <form method="POST" action="{{ route('update.to.cart') }}">
            @csrf
            <table id="cart" class="table table-hover table-condesed">
                <thead>

                <tr>
                    <th style="width: 16%">Name</th>
                    <th style="width: 10%">Image</th>
                    <th style="width: 10%">Price</th>
                    <th style="width: 10%">Quantity</th>
                    <th style="width: 10%">Subtotal</th>
                    <th style="width: 16%">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp

                @if ($carts)
                    @foreach ($carts as $cart)
                        @php
                            $subtotal = $cart->price * $cart->quantity;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td data-th="Product">{{ $cart->name }}</td>
                            <td data-th="Image">
                                <img src="{{ asset('storage/attachments/'.$cart->image) }}" style="width: 200px;"/>
                            </td>
                            <td data-th="Price">{{ $cart->price }}</td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control text-center" name="quantity[{{ $cart->id }}]" value="{{ $cart->quantity }}">
                            </td>
                            <td data-th="Subtotal">{{ $subtotal }}</td>
                            <td data-th="" class="action">
                                <a href="{{ route('delete.to.cart', $cart->id) }}" style="background:#E2F6ED;color:black;text-decoration:none;padding:8px;border-radius:6px;">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong></strong></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs text-center"><strong>Total: {{ $total }}</strong></td>
                        <td>
                            <a href="{{ url('/show-list') }}" class="btn btn-warning">Continue Shopping</a>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <button type="submit" class="btn btn-primary"> Update Card</button>
            <a href="{{ route('delete.all.cart') }}" class="btn btn-warning">Delete all cart</a>
            <input type="submit" class="btn btn-warning" formaction="{{ route('checkout.cart') }}" value="Buy now">
        </form>
    </div>
</div>
@endsection
