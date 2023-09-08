<header class="version_1">
    @php
        $Categories = DB::table('Categories')
            ->whereNotIn('name', ['nam', 'nữ', 'không xác định'])
            ->get();

    @endphp
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="" width="100" height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="#0">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="{{ asset('img/logo.svg') }}"><img src="{{ asset('img/logo_black.svg') }}" alt="" width="100"
                                    height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li class="submenu">
                                <a href="#0" class="show-submenu">Nam</a>
                                <ul>
                                    @foreach ($Categories as $cate)
                                        <li><a href="{{ route('categories', ['idc'=>'nam','id'=>$cate->name]) }}">{{ $cate->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#0" class="show-submenu">nữ</a>
                                <ul>
                                    @foreach ($Categories as $cate)
                                        <li><a href="{{ route('categories', ['idc'=>'nữ','id'=>$cate->name]) }}">{{ $cate->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#0" class="show-submenu">khác</a>
                                <ul>
                                    <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                                    <li><a href="{{ route('contract') }}">Liên hệ</a></li>
                                    <li><a href="{{ route('help') }}">Giúp đỡ</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('blog.all')}}" class="show-submenu">Bài viết</a>
                            </li>
                            <li>
                                <a href="{{ route('sale') }}" class="show-submenu">giảm giá</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top" href="tel://0353681506"><span>Cần hỗ trợ</span> <br> Liên hệ:
                        0353681506</a>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Danh Mục
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        <li><span><a href="#">Nam</a></span>
                                            <ul>
                                                @foreach ($Categories as $cate)
                                                <li><a href="{{ route('categories', ['idc'=>'nam','id'=>$cate->name]) }}">{{ $cate->name}}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Nữ</a></span>
                                            <ul>
                                                @foreach ($Categories as $cate)
                                                <li><a href="{{ route('categories', ['idc'=>'nữ','id'=>$cate->name]) }}">{{ $cate->name}}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li><span><a href="#">Khác</a></span>
                                            <ul>
                                                <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                                                <li><a href="{{ route('contract') }}">Liên hệ</a></li>
                                                <li><a href="{{ route('help') }}">Giúp đỡ</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm">
                            <button type="submit"><i class="header-icon_search_custom"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="{{ route('cart') }}" class="cart_bt">
                                    @if (session('cart'))
                                        <strong></strong>
                                    @endif
                                </a>
                                <div class="dropdown-menu">
                                    @php
                                        $totalAmount = 0;
                                    @endphp
                                    @if (session('cart') && !is_null(session('cart')))
                                        @foreach (session('cart') as $row)
                                            @php
                                                $itemTotal = $row['price'] * $row['quantity'];
                                                $totalAmount += $itemTotal;
                                            @endphp
                                            <ul>
                                                <li>
                                                    <a href="/product/detail/{{ $row['idProduct'] }}">
                                                        <figure><img
                                                                src="img/products/product_placeholder_square_small.jpg"
                                                                data-src="{{ asset($row['urlHinh']) }}" alt=""
                                                                width="50" height="50" class="lazy"></figure>
                                                        <strong><span>{{ $row['name'] }}</span>{{ number_format($row['price'], 0, ',', '.') }}đ</strong>
                                                    </a>
                                                    <a href="/cart/delete/{{ $row['idProduct'] }}" class="action"><i
                                                            class="ti-trash"></i></a>
                                                </li>
                                            </ul>
                                        @endforeach
                                        <div class="total_drop">
                                            <div class="clearfix">
                                                <strong>Tổng:</strong><span>{{ number_format($totalAmount, 0, ',', '.') }}đ</span>
                                            </div>
                                            <a href="" class="btn_1 outline">Chi tiết</a><a
                                                href="{{ route('checkout.view') }}" class="btn_1">Thanh toán</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            <a href="#0" class="wishlist"><span>Wishlist</span></a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                @if (Auth::check())
                                    <img src="{{ asset('img/avatar/default.jpg') }}" class="avatar" alt="Avatar">
                                    <div class="dropdown-menu">
                                        <div class="ms-3">Xin chào, <i
                                                class="text-info">{{ Auth::user()->name }}</i>
                                        </div>
                                        <ul>
                                            @if (Auth::user()->role == 0)
                                                <li>
                                                    <a href="{{ route('admin') }}"><i class="ti-window"></i>Quản lý
                                                        Website</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('trackOrder') }}"><i class="ti-truck"></i>Theo dõi
                                                    đơn hàng</a>
                                            </li>
                                            <li>
                                                <a href="/profile"><i class="ti-user"></i>Hồ sơ cá nhân</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('help') }}"><i class="ti-help-alt"></i>Giúp
                                                    đỡ</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="post"
                                                    id="logout-form">
                                                    @csrf
                                                    <div class="p-3">
                                                        <button class="border-0 bg-white" type="submit"><i
                                                                class="fa-solid fa-right-from-bracket me-2"></i> Đăng
                                                            xuất</button>
                                                    </div>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('account') }}" class="access_link"><span>Tài Khoản</span></a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('account') }}" class="btn_1">Đăng nhập & Đăng kí</a>
                                        <ul>
                                            <li>
                                                <a href="{{ route('trackOrder') }}"><i class="ti-truck"></i>Theo dõi
                                                    đơn hàng</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('help') }}"><i class="ti-help-alt"></i>Giúp
                                                    đỡ</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="#0" class="btn_search_mob"><span>Search</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
