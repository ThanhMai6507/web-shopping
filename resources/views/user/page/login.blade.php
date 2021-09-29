@extends("layouts.user.userlayout")
@section('content')

<div class="container"> 
    <div class="register">
          <div class="col-md-6 login-right">
              <h3>Đăng Nhập</h3>

            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{url('/check-login')}}">
            @csrf
              <div>
                <span>Email<label>*</label></span>
                <input name="email" type="text"> 
              </div>
              <div>
                <span>Password<label>*</label></span>
                <input name="password" type="password" > 
              </div>
              <input type="submit" value="Login">
            </form>
           </div>
           
    </div>
 </div>

@endsection
