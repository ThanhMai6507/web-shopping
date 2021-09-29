@extends("layouts.admin.adminlayout")
@section('content')


<div class="row">
						
    <div class="col-12">
        
        <!-- General -->
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Menu</h4>
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
                    <form method="post" action="{{route('menu-type.update',[$editmenu->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label> Tên Menu </label>
                            <input type="text" name="menutype" value="{{$editmenu -> menu_type}}" onkeyup="ChangeToSlug()" id="slug"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Menu </label>
                            <input type="text" name="slug_menu_type" value="{{$editmenu -> Slug_Menu_type}}"  id="convert_slug" class="form-control">
                        </div>  
                        <div class="form-group">
                            <label>Trạng Thái </label><br/>
                                <select name="trangthai" class="form-control">
                                    @if ($editmenu -> Trang_Thai == 0)
                                    <option selected value="0">Hiển</option>
                                    <option value="1">Ẩn </option>
                                    @else
                                    <option value="0">Hiển</option>
                                    <option selected value="1">Ẩn </option>
                                    @endif
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