@extends('layouts.Clients')
@section('noidung')
<main class="bg_gray">
    <div class="container margin_60_35 add_bottom_30">
        <div class="main_title">
            <h2>Giới thiệu VnSneaker</h2>
            <p>Chúng tôi là của hàng chuyên bán giày Adidas chính hãng tại Việt Nam </p>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="box_about">
                    <h2>Sản phẩm</h2>
                    <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                    <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                    <img src="{{ asset('img/arrow_about.png') }}" alt="" class="arrow_1">
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                    <img src="{{ asset('img/about_1.svg') }}" alt="" class="img-fluid" width="350" height="268">
            </div>
        </div>
        <!-- /row -->
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
                    <img src="{{ asset('img/about_2.svg') }}" alt="" class="img-fluid" width="350" height="268">
            </div>
            <div class="col-lg-5">
                <div class="box_about">
                    <h2>Dịch vụ</h2>
                    <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                    <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                    <img src="{{ asset('img/arrow_about.png') }}" alt="" class="arrow_2">
                </div>
            </div>
        </div>
        <!-- /row -->
        <div class="row justify-content-center align-items-center ">
            <div class="col-lg-5">
                <div class="box_about">
                    <h2>Số lượng sản phẩm</h2>
                    <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                    <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                </div>

            </div>
            <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                    <img src="{{ asset('img/about_3.svg') }}" alt="" class="img-fluid" width="350" height="316">
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Lý do nên chọn VnSneaker</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="box_feat">
                        <i class="ti-medall-alt"></i>
                        <h3>+ 1000 khách hàng</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box_feat">
                        <i class="ti-help-alt"></i>
                        <h3>Hỗ trợ 24/24</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box_feat">
                        <i class="ti-gift"></i>
                        <h3>Ưu đãi hấp dẫn</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box_feat">
                        <i class="ti-headphone-alt"></i>
                        <h3>Nhân viên hỗ trợ 24/24</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box_feat">
                        <i class="ti-wallet"></i>
                        <h3>Thanh toán an toàn</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box_feat">
                        <i class="ti-comments"></i>
                        <h3>Hỗ trợ online</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
    </div>
    <!-- /bg_white -->
<!-- /container -->
</main>
@endsection
@section('css')
<link href="css/about.css" rel="stylesheet">
@endsection
