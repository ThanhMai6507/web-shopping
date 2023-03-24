@extends('layouts.backend')
@push('search')
    <x-search>
        <x-slot:slot>
            <select class="form-select" name='role'>
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
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-body">
                            <div class="table-responsive no-radius">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th><x-sort :sortName="'id'"></x-sort>ID</th>
                                            <th><x-sort :sortName="'name'"></x-sort>Name</th>
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
                                            <td style="display: flex; gap:20px;">
                                                <a href="{{ route('users.create') }}">Create</a>
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}">Update</a>
                                                <a href="">Infomation</a>
                                                <button>Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $users->appends(request()->all())->links() }}
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection