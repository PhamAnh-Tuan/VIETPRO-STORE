@extends('Backend.Master.master')
@section('title', 'Chỉnh sửa danh mục')
@section('category_edit')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Icons</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>
        <!--/.row-->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form method="post" action="{{ route('category.editPOST',['id'=> $category['cat_id']]) }}" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Danh mục cha:</label>
                                        <select class="form-control" name="cat_parent_id">
                                            <option value="0">----ROOT----</option>
                                            {!! getCategories($categories, 0, '', $category['cat_parent_id']) !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Danh mục</label>
                                        <input type="text" class="form-control" name="cat_name" placeholder="Tên danh mục mới"
                                            value="{{ $category->cat_name }}">
<<<<<<< HEAD
                                            @if(session()->has('thong-bao'))
                                                <div class="alert bg-danger" role="alert">
                                                    <svg class="glyph stroked cancel">
                                                        <use xlink:href="#stroked-cancel"></use>
                                                    </svg>Tên danh mục đã tồn tại!<a href="#" class="pull-right"><span
                                                            class="glyphicon glyphicon-remove"></span></a>
                                                </div>
                                             @endif
=======
                                            {!!showErrorEditCategory($errors, 'cat_name')!!}
>>>>>>> main
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa danh mục</button>
                                </form>
                            </div>
                            <div class="col-md-7">
<<<<<<< HEAD
                                @if(session()->has('thong-bao-update'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg> Đã sửa danh mục thành công! <a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif

=======
                                @if(session()->has('thong-bao-categoty-update'))
                                <div class="alert bg-success" role="alert">
                                    <svg class="glyph stroked checkmark">
                                        <use xlink:href="#stroked-checkmark"></use>
                                    </svg> Đã sửa danh mục thành công! <a href="#" class="pull-right"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                @endif
>>>>>>> main
                                
                                <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục </div>
                                    {!! listCategories($categories, 0, '') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script>
        $('#calendar').datepicker({});
        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
@endsection
