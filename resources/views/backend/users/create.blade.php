@extends('layouts.backend')

@section('content')
    <h1>Create New User</h1>

    <form action="{{ route('users.store') }}" method="post">
        @include('backend.users.form')
    </form>
@endsection
