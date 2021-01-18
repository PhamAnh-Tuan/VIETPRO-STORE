@extends('Backend.Master.master')
@section('title', 'Danh sách quản trị viên')
@section('user_list')
    <link rel="stylesheet" href="{{ asset('Backend/css/agolia.css') }}">
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
                <h1 class="page-header">Danh sách thành viên</h1>
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
                                @if (session('thong-bao'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>Đã thêm thành công<a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                @if (session('thong-bao-update'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>Đã cập nhật thành công<a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                @if (session('thong-bao-delete'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>Đã xóa thành công<a href="{{ route('user.index') }}" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                <a href="{{ route('user.create') }}" class="btn btn-primary">Thêm Thành viên</a>
                                {{-- Algolia --}}
                                <div style="float: right" class="aa-input-container" id="aa-input-container">
                                        <input type="search" id="aa-search-input" class="aa-input-search"
                                            placeholder="Nhập từ khóa tìm kiếm" name="search" autocomplete="off" />
                                        <svg class="aa-input-icon"></svg>
                                </div>
                                {{-- /Algolia --}}
                                <table class="table table-bordered" style="margin-top:20px;">

                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Avatar</th>
                                            <th>Email</th>
                                            <th>Full</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
                                            <th width='18%'>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    {{-- hiển thị avatar --}}
                                                    @if($item -> avatar == null)
                                                    {{-- nếu cột avatar rỗng thì tạo avatar theo tên --}}
                                                        <img src="{{ Avatar::create($item -> user_fullname)->setDimension(40, 40)->setFontSize(20)->setShape('square')->toBase64() }}">
                                                    @else
                                                    {{-- nếu có thì hiển thị avatar của user --}}
                                                        <img width="40px" height="40px" src="../uploads/avatar/{{ $item -> avatar }}">
                                                    @endif
                                                </td>
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
            <!-- Laravel scout + agolia -->
            <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
            <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
            <script>
                (function() {
                    var client = algoliasearch('WKMELACEWN', 'd1d63bc0cfbc54374de3d97ca5de413f');
                    var index = client.initIndex('users_index');
                    var enterPressed = false;
                    //initialize autocomplete on search input (ID selector must match)
                    autocomplete('#aa-search-input', {
                        hint: false
                    }, {
                        source: autocomplete.sources.hits(index, {
                            hitsPerPage: 10
                        }),
                        //value to be displayed in input control after user's suggestion selection
                        displayKey: 'user_fullname',
                        //hash of templates used when rendering dataset
                        templates: {
                            //'suggestion' templating function used to render a single suggestion
                            suggestion: function(suggestion) {
                                const markup = `
                                <div class="algolia-result">
                                    <span>
                                        ${suggestion._highlightResult.user_fullname.value}
                                    </span>
                                </div>
                            `;
                                return markup;
                            },
                            empty: function(result) {
                                return 'Xin lỗi, chúng tôi không tìm thấy kết quả với từ khóa "' + result
                                    .query + '"';
                            }
                        }
                    }).on('autocomplete:selected', function(event, suggestion, dataset) {
                        window.location.href = window.location.origin +
                            '/VIETPRO-STORE/public/trang-quản-trị/quản-trị-viên/search/' + suggestion.user_id;
                        enterPressed = true;
                    });
                })();

            </script>
            <!-- /Laravel scout + agolia -->
        @section('script')
            <!-- javascript -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/chart.min.js"></script>
            <script src="js/chart-data.js"></script>
        @endsection
    @endsection
