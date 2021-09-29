@extends("layouts.admin.adminlayout")
@section('content')


<div class="row">
						
    <div class="col-12">
        
        <!-- General -->
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Slide </h4>
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
                </div>
                <div class="card-body">
                    <form action="{{route('slide.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Tên Slide </label>
                            <input type="text" name="ten_slide" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Img</label>
                            <input type="file" name="img_slide" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label>Trạng Thái</label><br/>
                                <select name="trangthai" class="form-control">
                                    <option value="0" >Hiện</option>
                                    <option value="1" >Ẩn</option>
                                </select>
                           
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        
        <!-- /General -->
            
    </div>
</div>


@endsection