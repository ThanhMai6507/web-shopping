@extends('layouts.admin')

@section('content')
    <h1 style="margin-left:20%">Update User</h1>

    <form action="{{ route('users.update', $user->id) }}" style="width: 70%; margin-left:20%" method="post">
        @method('PUT')  
        @include('backend.users.form')
    </form>
@endsection
