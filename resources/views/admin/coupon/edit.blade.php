@extends("layouts.admin.adminlayout")
@section('content')


    <div class="row">

        <div class="col-12">

            <!-- General -->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mã Giảm Giá</h4>
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
                    <form method="post" action="{{ route('category.update', [$editcategory->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label> Tên Danh Mục </label>
                            <input type="text" name="category_name" value="{{ $editcategory->category_name }}"
                                onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Slug Danh Mục </label>
                            <input type="text" name="slug_category" value="{{ $editcategory->slug_category }}"
                                id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Mô Tả Danh Mục </label>
                            <input type="text" name="category_desc" value="{{ $editcategory->category_desc }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label> TỪ Khóa Danh Mục </label>
                            <input type="text" name="category_keywords" value="{{ $editcategory->category_keywords }}"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>

            <!-- /General -->

        </div>
    </div>


@endsection
