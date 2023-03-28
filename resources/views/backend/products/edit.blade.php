@extends('layouts.backend')

@section('content')
    <br>
    <h1>Update Product</h1>
    <br>
    <form action="{{ route('products.update', $product->id) }}" style="width: 80%" method="post" enctype="multipart/form-data">
        @method('PUT')  
        @include('backend.products.form')
    </form>
@endsection
