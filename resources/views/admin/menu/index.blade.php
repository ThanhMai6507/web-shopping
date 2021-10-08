@extends("layouts.admin.adminlayout")
@section('content')


    <div class="row">

        <div class="col-12">


            <!-- General -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hiển Thị Menu </h4>
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
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="#: activate to sort column descending"
                                                                style="width: 86px;">#</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Tên Menu</th>
                                                            <th class="text-right sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Actions: activate to sort column ascending"
                                                                style="width: 221px;">
                                                                #</th>
                                                        </tr>
                                                    </thead>
                                                    <tr role="row" class="odd">
                                                        @foreach ($listmenu as $key => $value)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> {{ $value->id }}</td>

                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $value->menu_type }} </a>
                                                            </h2>
                                                        </td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a href="{{ route('menu-type.edit', [$value->id]) }}"
                                                                    class="btn btn-primary"> Sửa </a>
                                                                <a class="btn btn-sm">
                                                                    <form
                                                                        action="{{ route('menu-type.destroy', [$value->id]) }}"
                                                                        method="post">
                                                                        @method('Delete')
                                                                        @csrf
                                                                        <button
                                                                            onclick="return confirm('Bạn Muốn Xóa Menu Này?')"
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
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">

                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="DataTables_Table_0_previous">
                                                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0"
                                                                tabindex="0" class="page-link">Previous</a>
                                                        </li>
                                                        <li class="paginate_button page-item active">
                                                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1"
                                                                tabindex="0" class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="DataTables_Table_0_next">
                                                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2"
                                                                tabindex="0" class="page-link">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
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
