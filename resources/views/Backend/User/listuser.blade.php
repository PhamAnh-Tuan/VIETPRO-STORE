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
                                <div style="float: right" class="aa-input-container" id="aa-input-container">
                                        <input type="search" id="aa-search-input" class="aa-input-search"
                                            placeholder="Nhập từ khóa tìm kiếm" name="search" autocomplete="off" />

                                        <svg class="aa-input-icon"
                                            viewBox="654 -372 1664 1664">
                                            <path
                                                d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                                        </svg>
                                </div>
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
                                        @foreach ($users as $key => $item)
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
