@extends('layouts.admin')

@section('content')
    <br>
    <h1 style="margin-left:20%">Create Product</h1>
    <br>
    <form action="{{ route('products.store') }}" style="width: 70%;margin-left:20%" method="post" enctype="multipart/form-data">
        @include('backend.products.form')
    </form>
@endsection
