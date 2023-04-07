@extends('layouts.admin')
@push('search')
    <x-search>
        <x-slot:slot>
        <select class="form-select" style="width: 10rem; height: 38px; border-radius: 4px; padding:5px" name='category_id'>
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
<div class="page-wrapper" style="margin-left:20%">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">List Products</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-table flex-fill">
                    <div class="card-body">
                        <div class="table-responsive no-radius">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-warning">
                                {{session('error')}}
                            </div>
                            @endif
                            <table class="table table-hover table-center">
                                <thead>
                                    <tr>
                                        <th><x-sort :sortName="'id'" columnTitle="ID"></x-sort></th>
                                        <th><x-sort :sortName="'name'" columnTitle="Name"></x-sort></th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">{{ $product->id }}</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">{{ $product->name }}</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">{{ $product->category->name ?? null }}</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">{{ $product->price }}</div>
                                        </td>
                                        <td class="text-nowrap" style="width: 15%">
                                            @if ($product->attachment)
                                                <img class="img-fluid" src="{{ asset('storage/attachments/'.$product->attachment->file_name) }} ?? null">
                                            @endif
                                        </td>
                                        <td >
                                            <div class="actions" style="display: flex;gap:5px; height:40px; margin:auto">
                                                <a href="{{ route('products.create') }}" style="background: #E0F6F6;"
                                                    class="btn btn-sm bg-info-light me-2">
                                                    Thêm
                                                </a>

                                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" style="background: #E2F6ED;"
                                                    class="btn btn-sm bg-success-light me-2">
                                                    Sửa
                                                </a>

                                                <x-button_delete route="{{ route('products.destroy', ['product' => $product->id]) }}"></x-button_delete>
                                                
                                                <a href="{{ route('products.show', ['product' => $product->id]) }}" style="background: #E0F6F6; color:#1DB9AA"
                                                    class="btn btn-sm bg-info-light me-2"> Chi tiết
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->appends(request()->all())->links() }}
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection