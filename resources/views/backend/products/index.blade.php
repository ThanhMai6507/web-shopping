@extends('layouts.backend')

@section('content')
<div class="page-wrapper">
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
            <div class="col-md-12 d-flex">
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
                                        <td class="text-nowrap">
                                            @if ($product->attachment)
                                                <img class="img-fluid" src="">
                                            @endif
                                        </td>
                                        <td >
                                            <div class="actions" style="display: flex;">
                                                <a href="#" style="background: #E0F6F6;"
                                                    class="btn btn-sm bg-info-light me-2">
                                                    <i data-feather="user" width="16" color="#1DB9AA"></i>
                                                </a>

                                                <a href="#" style="background: #E2F6ED;"
                                                    class="btn btn-sm bg-success-light me-2">
                                                    <i data-feather="edit" width="16" color="#26AF48"></i>
                                                </a>

                                                <x-button_delete route="#"></x-button_delete>
                                                
                                                <a href="#" style="background: #E0F6F6; width:16; color:#1DB9AA; margin-left:10px"
                                                    class="btn btn-sm bg-info-light me-2"> Infomation
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