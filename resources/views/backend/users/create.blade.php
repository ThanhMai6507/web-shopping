@extends('layouts.backend')

@section('content')
    <br>
    <h1>Create New User</h1>
    <br>
    <form action="{{ route('users.store') }}" style="width: 80%" method="post">
        @include('backend.users.form')
    </form>
@endsection
