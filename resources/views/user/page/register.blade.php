@extends("layouts.user.userlayout")
@section('content')

<div class="container"> 
    <div class="register">
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
           <form method="post" action="{{url('/check-register')}}" > 
            @csrf
            <div class="register-top-grid">
               <h3>Đăng Kí Tài Khoản</h3>

               
                <div>
                   <span>Têm Hiển Thị <label>*</label></span>
                   <input name="displayName" type="text"> 
                </div>
                <div>
                    <span>Địa Chỉ Email<label>*</label></span>
                    <input name="email" type="email"> 
                </div>
                <div class="clearfix"></div>
                
                </div>
                <div class="register-bottom-grid">
                        <div>
                           <span>Mật Khẩu<label>*</label></span>
                           <input name="password" type="password">
                        </div>
                        {{-- <div>
                           <span>Nhập Lại Mật Khẩu <label>*</label></span>
                           <input  ame="passwordConfirm" type="password">
                        </div> --}}
                        <div class="clearfix"> </div>
                </div>

                <div class="register-but">

                    <input type="submit" value="submit">
                    <div class="clearfix"> </div>
  
             </div>
           </form>
           <div class="clearfix"> </div>
          
      </div>
</div>

@endsection
