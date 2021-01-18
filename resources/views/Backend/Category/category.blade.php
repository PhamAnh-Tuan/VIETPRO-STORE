@extends('Backend.Master.master')
@section('title', 'Danh mục sản phẩm')
@section('category')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh mục</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{-- Algolia --}}
                <div style="float: left" class="aa-input-container" id="aa-input-container">
                    <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Nhập từ khóa tìm kiếm"
                        name="search" autocomplete="off" />
                    <svg class="aa-input-icon"></svg>
                </div>
                {{-- /Algolia --}}
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{ route('category.create') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Danh mục cha:</label>
                                        <select class="form-control" name="cat_parent_id" id="">
                                            <option value="0">----ROOT----</option>

                                            {!! getCategories($category, 0, '', 0) !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Danh mục</label>
                                        <input type="text" class="form-control" name="cat_name" id=""
                                            placeholder="Tên danh mục mới">
                                        {!! showErrorEditCategory($errors, 'cat_name') !!}
                                    </div>
                                    @can('add')
                                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                    @endcan
                                </form>
                            </div>
                            <div class="col-md-7">
                                @if (session()->has('thong-bao-them-moi-thanh-cong'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg> Đã thêm danh mục thành công! <a href="{{ route('category.index') }}"
                                            class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                @if (session()->has('thong-bao-categoty-update'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg> Đã cập nhật danh mục thành công! <a href="{{ route('category.index') }}"
                                            class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục </div>
                                    {!! listCategories($category, 0, '') !!}
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
    <!-- Laravel scout + agolia -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="js/algolia-categories.js"></script>
@section('script')
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
@endsection
@endsection
