@extends('layouts.backend')

@section('content')
    <h1>Update User</h1>

    <form action="{{ route('users.update', $user->id) }}" style="width: 80%" method="post">
        @method('PUT')  
        @include('backend.users.form')
    </form>
@endsection
