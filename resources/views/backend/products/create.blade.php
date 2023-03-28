@extends('layouts.backend')

@section('content')
    <br>
    <h1>Create Product</h1>
    <br>
    <form action="{{ route('products.store') }}" style="width: 80%" method="post" enctype="multipart/form-data">
        @include('backend.products.form')
    </form>
@endsection
