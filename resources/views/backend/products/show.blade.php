@extends('layouts.admin')

@section('content')
    <h1 style="margin-left:20%">Detail product</h1>
    <br>
    
    <div class="row settings-tab" style="margin-left:20%">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin product</h4>
                </div>
                <div class="card-body" style="display:flex; gap:30px">
                    <div class="form-group">
                        <label>Sản phẩm</label>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <p>{{ $product->price }}</p>
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <p>{{ $product->category->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <p>{{ $product->category->color }}</p>
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <p>{{ $product->category->size }}</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-body p-0">
                

                <div class="actions" style="display: flex; justify-content: between; width:100%; gap:5px; height:40px; margin:auto">
                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" style="background: #E2F6ED;"
                        class="btn btn-sm bg-success-light me-2">
                        Sửa
                    </a>
                    <x-button_delete route="{{ route('products.destroy', ['product' => $product->id]) }}"></x-button_delete>                   
                </div>
            </div>
@endsection
