@extends('Backend.Master.master')
@section('title', 'Thêm quản trị viên')
@section('user_add')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <form action="{{ route('user.createPost') }}" method="post">
                                @csrf
                                <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="user_email" class="form-control" value="{{old('user_email')}}">
                                        {!!showError($errors, 'user_email')!!}
                                    </div>
                                    <div class="form-group">
                                        <label>password</label>
                                        <input type="password" name="user_password" class="form-control" value="{{old('user_password')}}">
                                        {!!showError($errors, 'user_password')!!}
                                    </div>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="full" name="user_fullname" class="form-control" value="{{old('user_fullname')}}">
                                        {!!showError($errors, 'user_fullname')!!}
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="user_address" class="form-control" value="{{old('user_address')}}">
                                        {!!showError($errors, 'user_address')!!}
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="phone" name="user_phone" class="form-control" value="{{old('user_phone')}}">
                                        {!!showError($errors, 'user_phone')!!}
                                    </div>
    
                                    <div class="form-group">
                                        <label>Level</label>
                                            <select name="user_level" class="form-control" value="{{old('user_level')}}">
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Supper Admin</option>
                                            </select>
                                        {!!showError($errors, 'user_level')!!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
    
                                        <button class="btn btn-success" type="submit">Thêm thành viên</button>
                                        <a href="{{route('user.index')}}" class="btn btn-danger" type="reset">Huỷ bỏ</a>
                                    </div>
                                </div>
                            </form>
                            


                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
@section('script')
    <!--end main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
@endsection
@endsection
