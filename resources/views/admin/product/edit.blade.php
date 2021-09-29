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
                    <form action="{{route('product.update',[$product_edit->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label> Tên Sản Phẩm  </label>
                            <input type="text" name="name_product" value="{{$product_edit -> name_product}}"  onkeyup="ChangeToSlug()" id="slug"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Sản Phẩm </label>
                            <input type="text" name="slug_product" value="{{$product_edit -> slug_product}}" id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Img</label>
                            <input type="file" name="img_product"value="{{$product_edit -> img_product}}" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label> code  </label>
                            <input type="text" name="code" value=" {{$product_edit -> code}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Tóm Tắt  </label>
                            <textarea name="description" value=" {{$product_edit -> description}}" class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                            <label> Giá   </label>
                            <input type="number" name="price" value=" 12312 " class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Chi tiết  </label>
                            <textarea name="detail" class="form-control" value="{{$product_edit -> category_name}}" ></textarea>
                        </div>
                       

                        <div class="form-group">
                            <label> Danh Mục </label><br/>
                                <select name="category_product_id" class="form-control">
                                    @foreach ($category_product_edit as $key => $lisnu)
                                    <option {{$lisnu -> id == $product_edit -> category_id ? 'selected' : ''}} value="{{$lisnu -> id}} ">{{$lisnu -> category_name}} </option>
                                    @endforeach
                                </select>
                        </div>
                      
                        <div class="form-group">
                            <label>Hàng vừa về</label><br/>
                                <select name="hot" class="form-control">
                                    <option value="0" >Hiện</option>
                                    <option value="1" >Ẩn</option>
                                </select>
                           
                        </div>
                        <div class="form-group">
                            <label>Trang Thái</label><br/>
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