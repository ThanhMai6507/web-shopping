@extends("layouts.admin.adminlayout")
@section('content')


    <div class="content container-fluid">

        <!-- Page Header -->
        {{-- <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div> --}}
        <!-- /Page Header -->
        <h3 class="page-title">Chi Tiết Đơn Hàng</h3>
        <a href="{{ url('admin/order') }}" class="btn btn-primary">
            Trở về
        </a>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0"> {{ $order_us->order_name }} </h4>
                            <h6 class="text-muted" style="font-size: 30px;"> {{ $order_us->order_phone }} </h6>
                            <div class="about-text" style="font-size: 30px;"> {{ $order_us->order_address }} </div>
                        </div>
                        <div class="col-auto profile-btn">

                            @if ($order_us->status == 1)
                                <a href="{{ url('admin/order-accept/' . $order_us->id) }}" class="btn btn-primary">
                                    Chấp Nhận
                                </a>
                            @endif
                            @if ($order_us->status == 0)
                                <a href="{{ url('admin/order-delivery/' . $order_us->id) }}" class="btn btn-primary">
                                    Giao Hàng
                                </a>
                            @endif
                            @if ($order_us->status == 3)
                                {{-- <a href="{{ url('admin/order-delivery/'.$order_us-> id) }}" class="btn btn-primary">
                            Giao Hàng
                        </a> --}}
                                <p> Đơn Hàng Đang Được Thực Hiện</p>
                            @endif
                            @if ($order_us->status != 3)
                                <a class="btn btn-sm">
                                    <a class="btn btn-danger"
                                        onclick="return confirm('Ban muon xoa ?')"
                                        href="{{ url('admin/order-delete', [$order_us->id]) }}">Xóa</a>
                                </a>
                            @endif
                           
                        </div>
                    </div>
                </div>
                {{-- <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                    </li>
                </ul>
            </div> --}}
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Chi tiết sản phẩm</span>
                                        </h5>
                                        @php
                                            $tongtien = '0';
                                        @endphp
                                        @foreach ($order as $key => $or)
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Tên Sản Phẩm
                                                </p>
                                                <p class="col-sm-10">{{ $or->order_name_product }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Số Lượng</p>
                                                <p class="col-sm-10">{{ $or->order_qty }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Giá</p>
                                                <p class="col-sm-10">{{ $or->order_price }}</p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                @if ($order_us -> coupon_status == 1)
                                 <h5> Đơn Hàng Này Được Sử Dụng Mã Giảm Giá </h5>
                                @endif
                               
                                <h3> Tổng Tiền:    {{ number_format($order_us->order_totol, 0, ',', '.') . ' ' . 'VND' }} </h3>

                                <!-- Edit Details Modal -->

                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->

                    <!-- Change Password Tab -->

                    <!-- /Change Password Tab -->

                </div>
            </div>
        </div>

    </div>


@endsection
