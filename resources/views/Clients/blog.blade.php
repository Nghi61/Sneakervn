@extends('layouts.clients')
@section('title')
VnSneaker - Bài viết
@endsection
@section('css')
<link href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endsection
@section('noidung')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="{{ route('blog.all') }}">Bài viết</a></li>

                </ul>
            </div>
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm bài viết..">
                        <button type="submit"><i class="ti-search"></i></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-md-6">
                        <article class="blog">
                            <figure>
                                <a href="{{ route('blog', ['slug'=>$blog->slug]) }}"><img src="{{ asset($blog->urlHinh) }}" alt="">
                                    <div class="preview"><span>Đọc thêm</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <small>Đăng ngày: {{$blog->created_at->format('d/m/y')}}</small>
                                <h2><a href="{{ route('blog', ['slug'=>$blog->slug]) }}">{{$blog->title}}</a></h2>
                                <p>{!! mb_strimwidth($blog->content, 0, 100, '...')!!}</p>
                                <ul>
                                    <li>
                                        <div class="thumb"><img src="{{ asset('img/avatar/default.jpg') }}" alt=""></div> {{$blog->userName}}
                                    </li>
                                    <li><i class="ti-comment"></i>{{$blog->commentCount}}</li>
                                </ul>
                            </div>
                        </article>
                        <!-- /article -->
                    </div>
                    @endforeach
                    <div class="text-center">{{ $blogs->onEachSide(4)->links()}}</div>
                </div>
                <!-- /row -->

                <div class="pagination__wrapper no_border add_bottom_30">

                </div>
                <!-- /pagination -->

            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
                    <div class="form-group">
                        <input type="text" name="search" id="search_blog" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Bạn xem chưa</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach ($releted as $row)
                        <li>
                            <div class="alignleft">
                                <a href="{{ route('blog', ['slug'=>$row->slug]) }}"><img src="{{ asset($row->urlHinh) }}" alt=""></a>
                            </div>
                            <small>Đăng ngày: {{$row->created_at->format('d/m/y')}}</small>
                            <h3><a href="{{ route('blog', ['slug'=>$row->slug]) }}" title="">{{$row->title}}</a></h3>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
