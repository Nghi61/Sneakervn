@extends('layouts.clients')
@section('title')
VnSneaker - Bài Viết
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endsection
@section('noidung')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="{{ route('blog.all')}}">Bài viết</a></li>
                        <li>{{$blog->title}}</li>
                    </ul>
                </div>
            </div>
            <!-- /page_header -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="singlepost">
                        <figure><img alt="" class="img-fluid" style="width: 100%;" src="{{ asset($blog->urlHinh) }}"></figure>
                        <h1>{{ $blog->title }}</h1>
                        <div class="postmeta">
                            <ul>
                                <li><a href="#"><i class="ti-folder"></i> Category</a></li>
                                <li><i class="ti-calendar"></i> {{ $blog->created_at->format('d/m/y') }}</li>
                                <li><a href="#"><i class="ti-user"></i>{{ $blog->idUser }}</a></li>
                                <li><a href="#" id="quantity"><i class="ti-comment"></i>{{ $quantity }}</a></li>
                            </ul>
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">
                            <p>{{ $blog->content }}</p>
                        </div>
                        <!-- /post -->
                    </div>
                    <!-- /single-post -->

                    <div id="comments">
                        <div class="mb-4">
                            <div class="row mt-5">
                                <div class="col">
                                    <h4 id="commentCount">Bình luận({{ $quantity }})</h4>
                                </div>
                                <div class="col">
                                    <div class="text-end mt-2">
                                        <small>Lượt xem: {{ $blog->view }}</small>
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
                                <input type="hidden" id="idBlog" value="{{ $blog->id }}">
                                <br>
                                <button id="submitComment" class="btn btn-warning mt-3">Gửi bình luận</button>
                            @else
                                <h5 class="text-center mt-5"> <a class="text-decoration-none text-danger"
                                        href="/accounts">Đăng
                                        nhập</a>
                                    để bình
                                    luận</h5>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Bài viết liên quan</h4>
                        </div>
                        <ul class="comments-list">
                            @foreach ($releted as $row)
                                <li>
                                    <div class="alignleft">
                                        <a href="{{ route('blog', ['slug' => $row->slug]) }}"><img
                                                src="{{ asset($row->urlHinh) }}" alt=""></a>
                                    </div>
                                    <small>{{$row->idUser}} - {{ $row->created_at->format('d/m/y') }}</small>
                                    <h3><a href="{{ route('blog', ['slug' => $row->id]) }}">{{ $row->title }}</a></h3>
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
@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{ asset('js/comment-blog.js') }}"></script>
<script>
    var commentBlogUrl = "{{ route('comment.blog') }}";
</script>
@endsection
