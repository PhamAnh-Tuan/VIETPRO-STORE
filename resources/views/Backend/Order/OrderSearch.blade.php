@extends('Backend.Master.master')
@section('title', 'Danh sách đơn hàng')
@section('order')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Đơn hàng</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">

                                 
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>Xử lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key=> $item)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->ord_fullname}}</td>
                                            <td>{{$item->ord_phone}}</td>
                                            <td>{{$item->ord_address}}</td>
                                            <td>
                                                @if ($item->ord_state==1)
                                                <a href="{{route('order.detail',['id'=>$item->ord_id])}}" class="btn btn-warning"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i>Xử lý</a>
                                                @else
                                                <a href="{{route('order.index')}}" class="btn btn-warning"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i>Đã xử lý</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
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
