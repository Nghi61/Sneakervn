@extends('layouts.clients')
@section('title')
VnSneaker - Liên hệ
@endsection
@section('css')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection
@section('noidung')
<main class="bg_gray">
    <div class="container margin_60">
        <div class="main_title">
            <h2>Liên hệ</h2>
            <p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-support"></i>
                    <h2>Trung tâm hỗ trợ</h2>
                    <a href="">0353681506</a> - <a href="#0">nghinvps23655@fpt.edu.vn</a>
                    <small>Hỗ trợ 24/24, Từ thứ 2 - 7</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-map-alt"></i>
                    <h2>Địa chỉ</h2>
                    <div>FPT Polytechnic Phần Mềm Quang Trung</div>
                    <small>Hỗ trợ 24/24, Từ thứ 2 - 7</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-package"></i>
                    <h2>Giao hàng</h2>
                    <a href="">0353681506</a> - <a href="#0">nghinvps23655@fpt.edu.vn</a>
                    <small>Hỗ trợ 24/24, Từ thứ 2 - 7</small>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
<div class="bg_white">
    <div class="container margin_60_35">
        <h4 class="pb-3">Góp ý</h4>
        <form action="{{ route('contract')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 add_bottom_25">
                    <div class="form-group">
                        @if (Auth::check())
                        <input class="form-control" required value="{{Auth::user()->name}}" placeholder="Họ tên*" type="text" name="name">
                        @else
                        <input class="form-control" required type="text" value="{{old('name')}}" placeholder="Họ tên*" name="name">
                        @endif
                    </div>
                    <div class="form-group">
                        @if (Auth::check())
                        <input class="form-control" required type="email" value="{{Auth::user()->email}}" placeholder="Email *" name="email">
                        @else
                        <input class="form-control" required type="email" value="{{old('email')}}" placeholder="Email *" name="email">
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" required name="message" value="{{old('message')}}" style="height: 150px;" placeholder="Góp ý *"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="Gửi">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 add_bottom_25">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.460720428777!2d106.62451457460412!3d10.852520057786432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b161f50ae47%3A0x2328d1d1acc3b11a!2sFPT%20Polytechnic%20-%20T%C3%B2a%20F!5e0!3m2!1sen!2s!4v1693698288996!5m2!1sen!2s" width="800" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </form>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_white -->
</main>
@endsection

