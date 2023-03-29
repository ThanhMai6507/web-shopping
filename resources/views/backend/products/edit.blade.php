@extends('layouts.admin')

@section('content')
    <br>
    <h1 style="margin-left:20%">Update Product</h1>
    <br>
    <form action="{{ route('products.update', $product->id) }}" style="width: 70%; margin-left:20%" method="post" enctype="multipart/form-data">
        @method('PUT')  
        @include('backend.products.form')
    </form>
@endsection
