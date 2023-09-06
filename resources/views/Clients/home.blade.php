@extends('layouts.Clients')
@section('noidung')
    <main>
        <div id="carousel-home">
            <div class="owl-carousel owl-theme">
                <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_2.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-lg-6 static">
                                    <div class="slide-text text-end white">
                                        <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Max 720 Sage
                                            Low</h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Phiên bản gới hạn
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                href="{{ route('sale') }}" role="button">Mua ngay</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_1.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-6 static">
                                    <div class="slide-text white">
                                        <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>VaporMax
                                            Flyknit 3</h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Phiên bản giới hạn
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                href="{{ route('sale') }}" role="button">Mua ngay</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
                <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_3.jpg);">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-12 static">
                                    <div class="slide-text text-center black">
                                        <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Monarch IV SE
                                        </h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Dệt nhẹ và hỗ trợ bền vững với lớp đệm Phylon.
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                                href="{{ route('sale') }}" role="button">Mua ngay</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/owl-slide-->
                </div>
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <!--/carousel-->

        <ul id="banners_grid" class="clearfix">
            <li>
                <a href="#0" class="img_container">
                    <img src="{{ asset('img/slides/banner_1.jpg') }}" data-src="{{ asset('img/slides/banner_1.jpg') }}"
                        alt="" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Giày Nam</h3>
                        <div><span class="btn_1">Mua ngay</span></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#0" class="img_container">
                    <img src="{{ asset('img/slides/banner_2.jpg') }}" data-src="{{ asset('img/slides/banner_2.jpg') }}"
                        alt="" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Giày Nữ</h3>
                        <div><span class="btn_1">Mua ngay</span></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#0" class="img_container">
                    <img src="{{ asset('img/slides/banner_3.jpg') }}" data-src="{{ asset('img/slides/banner_3.jpg') }}"
                        alt="" class="lazy">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <h3>Giày Trẻ Em</h3>
                        <div><span class="btn_1">Mua ngay</span></div>
                    </div>
                </a>
            </li>
        </ul>
        <!--/banners_grid -->

        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Sản phẩm nổi bật</h2>
                <span>Sản phẩm</span>
                <p>Sản phẩm được nhiều người quan tâm</p>
            </div>
            <div class="row small-gutters">
                <!-- /col -->
                @foreach ($HotProduct as $hot)
                    <div class="col-6 col-md-4 col-xl-3">
                        <form action="{{ route('cart') }}" method="post">
                            @csrf
                            <div class="grid_item">
                                @if ($hot->sale > 0 && (($hot->price - $hot->sale) / $hot->price) * 100 > 0)
                                    <span
                                        class="ribbon off">{{ round((($hot->price - $hot->sale) / $hot->price) * 100) }}%</span>
                                @else
                                    <span class="ribbon new">New</span>
                                @endif
                                <figure>
                                    <a href="{{ route('product.detail', ['id' => $hot->id]) }}">
                                        <img class="img-fluid lazy"
                                            src="{{ asset('img/products/product_placeholder_square_medium.jpg') }}"
                                            data-src="{{ $hot->urlHinh }}" alt="" width="400" height="400">
                                    </a>
                                </figure>
                                <a href="{{ route('product.detail', ['id' => $hot->id]) }}">
                                    <h3>{{ $hot->name }}</h3>
                                </a>
                                <div class="price_box">
                                    <span class="new_price">{{ number_format($hot->price, 0, ',', '.') }} vnđ</span>
                                </div>
                                <ul>
                                    <input type="hidden" name="id" value="{{ $hot->id }}">
                                    @php
                                        $sizes = DB::table('sizes')
                                            ->where('idProduct', $hot->id)
                                            ->get();
                                    @endphp
                                    <input type="hidden" name="size" value="{{ $sizes->first()->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <li><button class="btn btn-light" title="Thêm vào yêu thích"><i
                                                class="ti-heart"></i></button></li>
                                    <li><button class="btn btn-light" title="Thêm vào giỏ hàng"><i
                                                class="ti-shopping-cart"></i></button></li>
                                </ul>
                            </div>
                        </form>
                        <!-- /grid_item -->
                    </div>
                @endforeach
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="featured lazy" data-bg="url({{ asset('img/slides/slide_home_3_vertical.jpg') }})">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container margin_60">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 wow" data-wow-offset="150">
                            <h3>Armor<br>Air Color 720</h3>
                            <p>Đệm nhẹ và hỗ trợ bền bỉ với đế giữa Phylon</p>
                            <div class="feat_text_block">
                                <div class="price_box">
                                    <span class="new_price">{{ number_format(2000000, 0, ',', '.') }}đ</span>
                                    <span class="old_price">{{ number_format(2300000, 0, ',', '.') }}đ</span>
                                </div>
                                <a class="btn_1" href="listing-grid-1-full.html" role="button">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /featured -->

        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Sản phẩm mới</h2>
                <span>Sản Phẩm</span>
                <p>Những sản phẩm mới nhất của chúng tôi</p>
            </div>
            <div class="owl-carousel owl-theme products_carousel">
                <!-- /item -->
                @foreach ($NewProduct as $new)
                    <div class="item">
                        <form action="{{ route('cart') }}" method="post">
                            @csrf
                            <div class="grid_item">
                                @if ($new->sale > 0 && (($new->price - $new->sale) / $new->price) * 100 > 0)
                                    <span
                                        class="ribbon off">{{ round((($new->price - $new->sale) / $new->price) * 100) }}%</span>
                                @else
                                    <span class="ribbon new">New</span>
                                @endif

                                <figure>
                                    <a href="product/detail/{{ $new->id }}">
                                        <img class="owl-lazy img-fluid"
                                            src="img/products/product_placeholder_square_medium.jpg"
                                            data-src="{{ $new->urlHinh }}" alt="" width="400"
                                            height="400">
                                        </button>
                                </figure>
                                <a href="product/detail/{{ $new->id }}">
                                    <h3>{{ $new->name }}</h3>
                                </a>
                                <div class="price_box">
                                    <span class="new_price">{{ number_format($new->price, 0, ',', '.') }} vnđ</span>
                                </div>
                                <ul>
                                    <input type="hidden" name="id" value="{{ $new->id }}">
                                    @php
                                        $sizes = DB::table('sizes')
                                            ->where('idProduct', $new->id)
                                            ->get();
                                    @endphp
                                    <input type="hidden" name="size" value="{{ $sizes->first()->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <li><button class="btn btn-light" title="Thêm vào yêu thích"><i
                                                class="ti-heart"></i></button></li>
                                    <li><button class="btn btn-light" title="Thêm vào giỏ hàng"><i
                                                class="ti-shopping-cart"></i></button></li>
                                </ul>
                            </div>
                        </form>
                        <!-- /grid_item -->
                    </div>
                @endforeach
                <!-- /item -->
            </div>
            <!-- /products_carousel -->
        </div>
        <!-- /container -->
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Bài viết mới</h2>
                <span>Bài Viết</span>
                <p>Những bài viết mới được cập nhật</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt=""
                                width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>by Mark Twain</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Pri oportere scribentur eu</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-2.jpg" alt=""
                                width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>By Jhon Doe</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Duo eius postea suscipit ad</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-3.jpg" alt=""
                                width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>By Luca Robinson</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Elitr mandamus cu has</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="blog.html">
                        <figure>
                            <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-4.jpg" alt=""
                                width="400" height="266" class="lazy">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>By Paula Rodrigez</li>
                            <li>20.11.2017</li>
                        </ul>
                        <h4>Id est adhuc ignota delenit</h4>
                        <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                            ullum vidisse....</p>
                    </a>
                </div>
                <!-- /box_news -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection
