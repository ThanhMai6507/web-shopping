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
                    <form action="{{ route('menu-type.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label> Tên Menu </label>
                            <input type="text" value="{{old('menutype')}}" name="menutype" onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Menu </label>
                            <input type="text" value="{{old('slug_menu_type')}}" name="slug_menu_type" id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Default Select</label><br />
                            <select name="trangthai" class="form-control">
                                <option value="0">Hiện</option>
                                <option value="1">Ẩn</option>
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
