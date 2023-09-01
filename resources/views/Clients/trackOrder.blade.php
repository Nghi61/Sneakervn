@extends('layouts.Clients')
@section('noidung')
<main class="bg_gray vh-100 ">
    <div id="track_order">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <img src="img/track_order.svg" alt="" class="img-fluid add_bottom_15" width="200" height="177">
                    <p>Kiểm tra đơn hàng</p>
                    <form action="{{ route('trackOrderResault') }}" method="POST" >
                        @csrf
                        <div class="search_bar">
                            <input type="text" name="MHD" class="form-control" placeholder="Mã đơn hàng">
                            <input type="submit" value="Search">
                        </div>
                    </form>

                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /track_order -->

</main>
@endsection
@section('css')
<link href="css/error_track.css" rel="stylesheet">
@endsection
