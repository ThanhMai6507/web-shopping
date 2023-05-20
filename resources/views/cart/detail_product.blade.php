@extends('layouts.user')

@section('content')
<form method="POST" action="{{ route('update.to.cart') }}">
    <div style="display: flex; margin-left: 20%; width: 50%; margin-top: 5%;">
        <div>
            @if ($product->attachment)
                <img style="width: 60%" src="{{ asset('storage/attachments/'.$product->attachment->file_name) }}">
            @endif
        </div>

        <div style="width: 60%">
            <div style="font-weight: bold">
                <p>{{ $product->name }}</p>
            </div>
            <div style="color: red">
                <label>Giá: {{ $product->price }}</label>
            </div>
            <div class="">
                <label>Thể loại: {{ $product->category->name }}</label>
            </div>
        </div>
    </div>
    <br>
    <div style="gap: 50px; margin-left: 40%; margin-top: -63px">
        <a href="{{ route('add.to.cart', $product->id) }}" style="background-color: #47a3de;color: #fff;text-decoration: none;padding: 8px;border-radius: 6px;">Add to cart</a>
        <input type="submit" class="btn" formaction="{{ route('checkout.cart') }}" value="Buy now" style="background-color: #f05d40; color: #fff; margin-left: 20px">
        <a href="{{ url('/show-list') }}" class="btn btn-warning" style=" margin-left: 20px">Continue Shopping</a>
    </div>
</form>
@endsection
