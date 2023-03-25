@extends('layouts.backend')
@push('search')
<x-search>
        <x-slot:slot>
            <select class="form-select" style="width: 10rem" name='role'>
            <option value="0">Select Role</option>
            <option value="1" {{ request()->role == 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ request()->role != 1 ? 'selected' : '' }}>User</option>
            </select>
        </x-slot:slot>
    </x-search>
@endpush
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Danh sách User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">

                <div class="card card-table flex-fill">
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-warning">
                                {{session('error')}}
                            </div>
                            @endif
                            <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th><x-sort :sortName="'id'" columnTitle="ID"></x-sort></th>
                                            <th><x-sort :sortName="'name'" columnTitle="Name"></x-sort></th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-nowrap">
                                                <div class="font-weight-600">{{ $user->id }}</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="font-weight-600">{{ $user->name }}</div>
                                            </td>
                                            <td class="text-nowrap">{{ $user->email }}</td>
                                            <td>{{ $user->type == 1 ? 'admin' : 'user' }}</td>
                                            <td>
                                            <div class="actions" style="display: flex;">
                                                <a href="{{ route('users.create') }}" style="background: #E0F6F6;"
                                                    class="btn btn-sm bg-info-light me-2">
                                                    <i data-feather="user" width="16" color="#1DB9AA"></i>
                                                </a>
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" style="background: #E2F6ED;"
                                                    class="btn btn-sm bg-success-light me-2">
                                                    <i data-feather="edit" width="16" color="#26AF48"></i>
                                                </a>
                                                <a href="{{ route('users.show', ['user' => $user->id]) }}">Infomation</a>
                                                <x-button_delete route="{{ route('users.destroy', ['user' => $user->id]) }}"></x-button_delete>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><br>
                            {{$users->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection