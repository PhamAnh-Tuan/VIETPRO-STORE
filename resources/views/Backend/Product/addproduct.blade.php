@extends('Backend.Master.master')
@section('title', 'Thêm mới sản phẩm')
@section('product_add')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                        <form action="{{ route('product.createPOST') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select class="form-control mul-select" name="cat_id[]" multiple="true" id="news">
                                            {!! getCategories($categories, 0, '', 0) !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                                    </div>
                                    {!! showError($errors, 'code') !!}
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    {!! showError($errors, 'name') !!}
                                    <div class="form-group">
                                        <label>Giá sản phẩm (Giá chung)</label>
                                        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                                    </div>
                                    {!! showError($errors, 'price') !!}
                                    <div class="form-group">
                                        <label>Sản phẩm có nổi bật</label>
                                        <select name="featured" class="form-control" value="{{ old('featured') }}">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="state" class="form-control" value="{{ old('state') }}">
                                            <option value="1">Còn hàng</option>
                                            <option value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input id="img" type="file" name="image" class="form-control hidden"
                                            onchange="changeImg(this)" value="{{ old('image') }}">
                                        <img id="avatar" name="" class="thumbnail" width="100%" height="350px"
                                            src="img/product/import-img.png">
                                    </div>
                                    {!! showError($errors, 'image') !!}
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea name="info"
                                            style="width: 100%;height: 100px;">{{ old('info') }}</textarea>
                                    </div>
                                    {!! showError($errors, 'info') !!}
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="describer"
                                            style="width: 100%;height: 100px;">{{ old('describer') }}</textarea>
                                    </div>
                                    {!! showError($errors, 'describer') !!}
                                    <button class="btn btn-success" name="add-product" type="submit">Thêm sản phẩm</button>
                                    <a href="{{route('product.index')}}" class="btn btn-danger" type="reset">Huỷ bỏ</a>
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
@section('script')
    @parent
    {{-- <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script> --}}
    <script>
        $(document).ready(function() {
            $(".mul-select").select2({
                placeholder: "Chon danh muc", //placeholder
                tags: true,
                tokenSeparators: ['/', ',', ';', " "]
            });
        })

    </script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection




@endsection
