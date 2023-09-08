@extends('layouts.Admin')
@section('title')
    VnSneaker - Danh sách hóa đơn
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh sách hóa đơn</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                            class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Tìm kiếm...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th>Mã hóa đơn</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Thanh toán</th>
                                        <th>Giao hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td>{{ $bill->MHD }}</td>
                                            <td class="customer_name">{{ $bill->name }}</td>
                                            <td class="email">{{ $bill->email }}</td>
                                            <td class="phone">{{ $bill->phone }}</td>
                                            <td class="address">{{ $bill->address }}</td>
                                            <td class="payment">{{ $bill->payment }}</td>
                                            <td class="delivery">{{ $bill->delivery }}</td>
                                            <td class="total">{{ $bill->total }}</td>
                                            <td class="status">
                                                @if ($bill->status == 0)
                                                    <span
                                                        class="badge bg-danger-subtle text-danger text-uppercase">{{ $bill->status }}</span>
                                                @elseif($bill->status == 1)
                                                    <span
                                                        class="badge bg-info-subtle text-info text-uppercase">{{ $bill->status }}</span>
                                                @elseif($bill->status == 2)
                                                    <span
                                                        class="badge bg-primary-subtle text-primary text-uppercase">{{ $bill->status }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-success-subtle text-success text-uppercase">{{ $bill->status }}</span>
                                                @endif
                                            </td>
                                            <td>

                                                <form action="/admin/bill/{{ $bill->id }}" method="post">
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="/admin/bill/{{ $bill->id }}/cart"
                                                                class="btn btn-sm btn-success edit-item-btn">
                                                                Chi tiết
                                                            </a>
                                                        </div>
                                                        <div class="remove">
                                                            <button class="btn btn-sm btn-danger remove-item-btn"
                                                                onclick="return confirm('Xác nhận xóa hóa đơn của {{ $bill->name }}?')"
                                                                type="submit">Xóa</button>
                                                            @csrf @method('DELETE')
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>{{ $bills->onEachSide(10)->links()}}</td>
                                    </tr>
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
