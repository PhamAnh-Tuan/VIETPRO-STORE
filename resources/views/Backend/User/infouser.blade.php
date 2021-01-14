@extends('Backend.master.master')
@section('title','Thông tin thành viên')
	@section('user_list')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thông tin thành viên</div>
                    <div class="panel-body">
                        <form action="{{ route('user.avatar',['id'=>$user->user_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center" style="margin-bottom:40px">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" disabled class="form-control" value="{{ $user -> user_email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="text" name="fullname" disabled class="form-control" value="{{ $user -> user_fullname }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" disabled class="form-control" value="{{ $user -> user_address }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" disabled class="form-control" value="{{ $user -> user_phone }}">
                                    </div>        
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control" disabled>
                                            <option @if($user-> user_level === 1)  selected  @endif value="1">admin</option>
                                            <option @if($user-> user_level === 2)  selected  @endif value="2">user</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input id="img" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
                                        @if($user -> avatar == null)
                                            <img id="avatar" class="thumbnail" width="50%" height="250px" src="../uploads/avatar/no-img.jpg">
                                        @else
                                            <img id="avatar" class="thumbnail" width="50%" height="250px" src="../uploads/avatar/{{ $user -> avatar }}">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success"  type="submit">Cập nhật Avatar</button>
                                        <a href="#" class="btn btn-danger" type="button">Huỷ bỏ</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

        </div>
    </div>

        <!--/.row-->
    </div>

    <!--end main-->
    @endsection
    @section('script')
    @parent
    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function() {
                $('#img').click();
            });
        });
    </script>
   @endsection