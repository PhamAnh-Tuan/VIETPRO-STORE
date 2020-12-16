@extends('Backend.Master.master')
@section('title', 'Chỉnh sửa chi tiết quản trị viên')
@section('user_edit')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên - admin@gmail.com</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <form action="{{route('user.edit_post',['id'=>$user->user_id])}}" method="post">
                                @csrf
                                <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ $user->user_email }}">
                                            {!!showError($errors, 'user_email')!!}
                                        </div>
                                        <div class="form-group">
                                            <label>password</label>
                                            <input type="text" name="password" class="form-control" value="{{$user->user_password}}">
                                        </div>
                                        {!!showError($errors, 'user_password')!!}
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="full" name="full" class="form-control" value="{{$user->user_fullname}}">
                                        </div>
                                        {!!showError($errors, 'user_fullname')!!}
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="address" name="address" class="form-control" value="{{$user->user_address}}">
                                        </div>
                                        {!!showError($errors, 'user_address')!!}
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="phone" name="phone" class="form-control" value="{{$user->user_phone}}">
                                            {!!showError($errors, 'user_phone')!!}
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="level" class="form-control" value="">
                                                <option value="1">admin</option>
                                                <option selected value="2">user</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">

                                        <button class="btn btn-success" type="submit">Sửa thành viên</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
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
    <script src="js/chart-user.js"></script>
@endsection
@endsection
