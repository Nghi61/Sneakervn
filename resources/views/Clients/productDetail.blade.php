@extends('layouts.clients')
@section('title')
VnSneaker - Sản Phẩm
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_page.css') }}">
@endsection
@section('noidung')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>{{$Pro->name}}</li>
                    </ul>
                </div>
                <h1>{{ $Pro->name }}</h1>
            </div>
            <!-- /page_header -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-theme prod_pics magnific-gallery">
                        <div class="item">
                            <a href="{{ asset($Pro->urlHinh) }}" title="Photo title" data-effect="mfp-zoom-in"><img
                                    src="{{ asset($Pro->urlHinh) }}" alt=""></a>
                        </div>
                        @foreach ($Pro->img as $row)
                            <div class="item">
                                <a href="{{ asset($row->urlHinh) }}" title="Photo title" data-effect="mfp-zoom-in"><img
                                        src="{{ asset($row->urlHinh) }}" alt=""></a>
                            </div>
                        @endforeach
                    </div>
                    <!-- /carousel -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="bg_white">
            <div class="container margin_60_35">
                <form action="{{ route('cart') }}" method="post">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="container">
                                <div class="card-header">
                                    <h5 class="mb-3">
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A"
                                            aria-expanded="false" aria-controls="collapse-A">
                                            Mô tả
                                        </a>
                                    </h5>
                                    <p>{{ $Pro->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="prod_options version_2">
                                <div class="row">
                                    <label class="col-xl-7 col-lg-5 col-md-6 col-6"><strong>Size</strong> </label>
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-6">
                                        <div class="custom-select-form">
                                            <select class="wide" name="size">
                                                @foreach ($size as $row)
                                                    <option value="{{ $row->id }}">{{ $row->size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-7 col-lg-5  col-md-6 col-6"><strong>Số lượng</strong></label>
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-6">
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="quantity_1" class="qty2"
                                                name="quantity">
                                            <div class="inc button_inc">+</div>
                                            <div class="dec button_inc">-</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-7 col-md-6">
                                        @if ($Pro->sale <= 0)
                                            <div class="price_main"> <span
                                                    class="new_price">{{ number_format($Pro->price, 0, ',', '.') }}
                                                    đ</span></div>
                                        @else
                                            <div class="price_main"><span
                                                    class="new_price">{{ number_format($Pro->sale, 0, ',', '.') }}đ</span><span
                                                    class="percentage">{{ round((($Pro->price - $Pro->sale) / $Pro->price) * 100) }}%</span>
                                                <span class="old_price">{{ number_format($Pro->price, 0, ',', '.') }}
                                                    đ</span></div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="id" value="{{ $Pro->id }}">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="btn_add_to_cart"><button href="" class="btn_1">Thêm vào giỏ
                                                hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /row -->
            </div>
        </div>

        <div class="tab_content_wrapper">
            <div class="container mb-4">
                <div class="row mt-5">
                    <div class="col">
                        <h4 id="commentCount">Bình luận({{ $check }})</h4>
                    </div>
                    <div class="col">
                        <div class="text-end mt-2">
                            <small>Lượt xem: {{ $Pro->view }}</small>
                        </div>
                    </div>
                </div>
                <div id="commentList">
                    @foreach ($comment as $row)
                        <div class="comment">
                            <div class="comment-info row">
                                <div class="col">
                                    @foreach ($row->name as $author)
                                        <span class="comment-author">Tác giả: {{ $author['name'] }}</span>
                                    @endforeach
                                </div>
                                <div class="col text-end">
                                    <span class="comment-date">{{ $row->created_at }}</span>
                                </div>
                            </div>
                            <div class="comment-content">{{ $row->content }}</div>
                        </div>
                    @endforeach
                </div>

                @if (Auth::check())
                    <textarea id="commentText" rows="4" cols="50" class="w-100"></textarea>
                    <input type="hidden" id="id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" id="idPro" value="{{ $Pro->id }}">
                    <br>
                    <button id="submitComment" class="btn btn-warning mt-3">Gửi bình luận</button>
                @else
                    <h5 class="text-center mt-5"> <a class="text-decoration-none text-danger" href="/accounts">Đăng
                            nhập</a>
                        để bình
                        luận</h5>
                @endif

            </div>
        </div>

        <div class="bg_white">
            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                <div class="owl-carousel owl-theme products_carousel">
                    <!-- /item -->
                    <!-- /item -->
                    @foreach ($related as $hot)
                        <div class="grid_item">
                            @if ($hot->sale > 0 && (($hot->price - $hot->sale) / $hot->price) * 100 > 0)
                                <span class="ribbon off">{{ round((($hot->price - $hot->sale) / $hot->price) * 100) }}%</span>
                            @else
                                <span class="ribbon new">New</span>
                            @endif
                            <figure>
                                <a href="{{ route('product.detail', ['slug' => $hot->slug]) }}">
                                    <img class="img-fluid lazy" src="img/products/product_placeholder_square_medium.jpg"
                                        data-src="{{ asset($hot->urlHinh) }}" alt="" width="400"
                                        height="400">
                                </a>
                            </figure>
                            <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                    class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                            </div>
                            <a href="/product/detail/{{ $hot->slug }}">
                                <h3>{{ $hot->name }}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{ number_format($hot->price, 0, ',', '.') }} vnđ</span>
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Thêm vào yêu thích"><i
                                            class="ti-heart"></i><span>Thêm vào yêu thích</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Thêm vào giỏ hàng"><i
                                            class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    @endforeach
                </div>
                <!-- /products_carousel -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_white -->

    </main>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
var url = '{{ route('comment.product') }}';
var check=  parseInt("{{ $check }}");
</script>
<script src="{{ asset('js/product-detail.js') }}"></script>
@endsection

