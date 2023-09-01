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
            @if (!empty($bills))
            @foreach ($bills as $bill)
            <div class="table-responsive table-card mb-1">
                <table class="table align-middle" id="customerTable">
                    <thead class="table-light text-muted">
                        <tr>
                            <th >Họ tên</th>
                            <th >Email</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Địa chỉ</th>
                            <th>Thanh toán</th>
                            <th>Giao hàng</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">

                        <tr>
                            <td class="customer_name">{{ $bill->name }}</td>
                            <td class="email">{{ $bill->email }}</td>
                            <td class="phone">{{ $bill->phone }}</td>
                            <td class="total">{{ $bill->total}}</td>
                            <td class="address">{{ $bill->address}}</td>
                            <td class="payment">{{ $bill->payment}}</td>
                            <td class="delivery">{{ $bill->delivery}}</td>
                            <td class="status"><span
                                    class="badge bg-success-subtle text-success text-uppercase">{{ $bill->status }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
            @else
            <small class="text-center text-danger">Xin lỗi chúng tôi không tìm thấy đơn hàng của bạn, vui lòng kiểm tra lại mã đơn hàng</small>
            @endif
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /track_order -->

</main>
@endsection
@section('css')
<link href="css/error_track.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
@endsection
