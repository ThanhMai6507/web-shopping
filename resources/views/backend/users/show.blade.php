@extends('layouts.admin')

@section('content')
    <h1 style="margin-left:20%">Detail User</h1>
    <br>
    
    <div class="row settings-tab" style="margin-left:20%">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin User</h4>
                </div>
                <div class="card-body" style="display:flex; gap:30px">
                    <div class="form-group">
                        <label>Name</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <div class="col-md-8" style="width:40%">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }}</td>
                        </tr>

                        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Update</a>
                        <a href="{{ route('users.show', ['user' => $user->id]) }}">Infomation</a>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
