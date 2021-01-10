<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span>vietpro </span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    @if(Auth::check())
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user() -> avatar == null)
								<img src="{{ Avatar::create(Auth::user() -> user_fullname)->setDimension(30, 30)->setFontSize(20)->setShape('square')->toBase64() }}">
                            @else
                                <img width="30px" height="30px" src="../uploads/avatar/{{ Auth::user() -> avatar }}">
                            @endif
                        <use xlink:href="#stroked-male-user"></use></svg>{{ Auth::user()-> user_fullname }}<span class="caret"></span></a>
                    @endif
                    <ul class="dropdown-menu" role="menu"><li><a href="{{ route('user.info',['id'=>Auth::user() -> user_id]) }}">
                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
                    <li><a href="{{route('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>