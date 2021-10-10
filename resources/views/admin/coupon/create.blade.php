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
                    <form action="{{ route('coupon.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label> Tên Mã Giả Giá </label>
                            <input type="text" name="name_coupon" value="{{ old('name_coupon') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Mã Mã Giả Giá </label>
                            <input type="text" name="code_coupon" value="{{ old('code_coupon') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Số Lượng </label>
                            <input type="text" name="coupon_time" value="{{ old('coupon_time') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Điều Kiện</label><br />
                            <select name="coupon_condition" value="{{ old('coupon_condition') }}" class="form-control">
                               
                                <option value="1">Giảm Theo Phần Trăm</option>
                                <option value="2">Giảm Theo Tiền</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label> Số Giảm </label>
                            <input type="text" name="coupon_number" value="{{ old('coupon_number') }}"
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
