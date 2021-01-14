@extends('Backend.Master.master')
@section('title', 'Danh sách quản trị viên')
@section('user_search')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách thành viên</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">Tim kiem thành viên</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('user.excel') }}">Xuất danh sách</a>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="margin-top:20px;">

                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Full</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
                                            <th width='18%'>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userID as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->user_email }}</td>
                                                <td>{{ $item->user_fullname }}</td>
                                                <td>{{ $item->user_address }}</td>
                                                <td>{{ $item->user_phone }}</td>
                                                <td>
                                                    @if ($item->user_level == 1)
                                                        <span style="background: rgb(235, 8, 8)"
                                                            class="badge badge-danger rounded">Adimin</span>
                                                    @else
                                                        <span style="background: rgb(9, 233, 9)"
                                                            class="badge badge-success rounded">Quản trị viên</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.edit', ['id' => $item->user_id]) }}"
                                                        class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    <a href="{{ route('user.delete', ['id' => $item->user_id]) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div align='right'>
                                    {{--
                                    <!-- {{ $users->links() }} --> --}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/.row-->


            </div>
            <!--end main-->
        @section('script')
            <!-- javascript -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/chart.min.js"></script>
            <script src="js/chart-data.js"></script>
        @endsection
    @endsection
