@extends('layouts.backend')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
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
                            <table class="table table-hover table-center">
                                <thead>
                                    <tr>
                                        <th>
                                            <x-sort :sortName="'id'"></x-sort>Id
                                        </th>
                                        <th>
                                            <x-sort :sortName="'name'"></x-sort>Name product
                                        </th>
                                        <th>Category</th>
                                        <th>Description</th>
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
                                            <div class="font-weight-600">{{ $product->description }}</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">{{ $product->price }}</div>
                                        </td>
                                        <td class="text-nowrap">
                                            @if ($product->attachment)
                                                <img class="img-fluid" src="">
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="">Create</a>
                                            <a href="">Update</a>
                                            <a href="">Detail</a>
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
<script src="https://kit.fontawesome.com/46a24d346e.js" crossorigin="anonymous"></script>
