@extends("layouts.admin.adminlayout")
@section('content')


    <div class="row">

        <div class="col-12">


            <!-- General -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hiển Thị Mã Giảm Giá </h4>
                    <!-- Mesage -->
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
                    <!--End Mesage -->
                </div>
                <!-- /General -->
                <!-- Table -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table
                                                    class="datatable table table-hover table-center mb-0 dataTable no-footer"
                                                    id="DataTables_Table_0" role="grid"
                                                    aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">

                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Tên Mã Giảm Giá
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 109px;">
                                                                Code Giảmm Giá
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 109px;">
                                                                Số Lượng Giảm Giá
                                                            </th>

                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 109px;">
                                                               Điều Kiện
                                                            </th>

                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 109px;">
                                                                Số Giảm
                                                            </th>


                                                            <th class="text-right sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Actions: activate to sort column ascending"
                                                                style="width: 221px;">
                                                                #</th>

                                                        </tr>
                                                    </thead>
                                                    <tr role="row" class="odd">
                                                        @foreach ($coupons as $key => $values)
                                                    <tr role="row" class="odd">
                                                        
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $values->name_coupon }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $values->code_coupon }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $values->coupon_time }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $values->coupon_condition }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $values->coupon_number }} </a>
                                                            </h2>
                                                        </td>
                                                    
                                                        <td class="text-right">
                                                            <div class="actions">
                                                                {{-- <a href="{{ route('coupon.edit', [$values->id]) }}"
                                                                    class="btn btn-primary"> Sửa </a> --}}
                                                                <a class="btn btn-sm">
                                                                    <form
                                                                        action="{{ route('coupon.destroy', [$values->id]) }}"
                                                                        method="post">
                                                                        @method('Delete')
                                                                        @csrf
                                                                        <button
                                                                            onclick="return confirm('Bạn Muốn Xóa Mã Này?')"
                                                                            class="btn btn-danger">Xóa</button>

                                                                    </form>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Table -->

            </div>
        </div>


    @endsection
