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
@endsection
