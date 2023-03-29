@extends('layouts.admin')

@section('content')
    <br>
    <h1 style="margin-left:20%">Create New User</h1>
    <br>
    <form action="{{ route('users.store') }}" style="width: 70%;margin-left:20%" method="post">
        @include('backend.users.form')
    </form>
@endsection
