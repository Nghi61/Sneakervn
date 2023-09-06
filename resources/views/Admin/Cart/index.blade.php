@extends('layouts.Admin')
@section('title')
    VnSneaker - Chi tiết hóa đơn
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Chi tiết hóa đơn</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Hình</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($cart as $row)
                                        <tr>
                                            <td class="img_product"><img src="{{ asset($row->urlHinh) }}"
                                                alt=""></td>
                                        <td>{{ $row->ProductName }}</td>
                                        <td >{{ $row->Price }}</td>
                                        <td >{{ $row->size }}</td>
                                        <td class="text-center"> {{ $row->quantity }}</td>
                                        <td class="text-center">    {{ number_format($row['price'] * $row['quantity'], 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
@endsection
