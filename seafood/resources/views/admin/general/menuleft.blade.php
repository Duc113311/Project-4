 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('backend/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('backend/images/logo2.png')}}" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ</a>
                    </li>
                    <h3 class="menu-title">Món Ăn</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Quản lý thực đơn</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{route('dsfood')}}">List Thực Đơn</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('view_create')}}">Thêm Loại</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Nguyên Liệu</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Quản lý Nguyên liệu</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{route('get_res')}}">List Nguyên Liệu</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('view_create_t')}}">Thêm Loại Nguyên Liệu</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Tin Tức</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Quản lý Tin Tức</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{route('list_news')}}">List Tin Tức</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('thongk')}}">Thống Kê</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Đơn Hàng</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Đơn hàng online</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{route('getxacnhan')}}">Chưa xác nhận</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('get_xacnhandon')}}">Đã xác nhận</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('get_chebienxong')}}">Đã chế biến xong</a></li>
                            <li><i class="fa fa-table"></i><a href="taikhoan.html">Đang giao</a></li>
                            <li><i class="fa fa-table"></i><a href="taikhoan.html">Đã thanh toán</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('get_huy')}}">Đơn hàng hủy</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Đặt Bàn</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Quản Lý Đặt bàn</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{route('view_table_dat')}}">Bàn Chưa Xác Nhận</a></li>
                            <li><i class="fa fa-table"></i><a href="{{route('view_tb_xn')}}">Bàn Đã Xác Nhận</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        </nav>
    </aside><!-- /#left-panel -->
