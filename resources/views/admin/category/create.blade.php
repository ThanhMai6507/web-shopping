@extends("layouts.admin.adminlayout")
@section('content')


<div class="row">
						
    <div class="col-12">
        
        <!-- General -->
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category</h4>
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
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label> Tên Danh Muc </label>
                            <input type="text" name="category_name" onkeyup="ChangeToSlug()" id="slug"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Danh Muc </label>
                            <input type="text" name="slug_category"  id="convert_slug" class="form-control">
                        </div>  

                        <div class="form-group">
                            <label> Mô Tả Danh Muc </label>
                            <input type="text" name="category_desc" onkeyup="ChangeToSlug()" id="slug"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Từ Khóa Danh Muc </label>
                            <input type="text" name="category_keywords" onkeyup="ChangeToSlug()" id="slug"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Thuộc Menu </label><br/>
                                <select name="category_menu" class="form-control">
                                    <option value="0" >Không Thuộc Menu Nào</option>
                                    @foreach ($menuid as $key => $menuid)       
                                    <option value="{{$menuid -> id}}" >{{$menuid -> menu_type}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label>Trang Thai</label><br/>
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