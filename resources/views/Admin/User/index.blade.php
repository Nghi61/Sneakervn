@extends('layouts.Admin')
@section('title')
    VnSneaker - Danh sách tài khoản
@endsection
@section('content')
    <div class="row">
            <div class="col-lg-12">
                <div class="card" id="customerList">
                    <div class="card-header border-bottom-dashed">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Danh sách tài khoản</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex flex-wrap align-items-start gap-2">
                                    <form action="/admin/user/create" method="get"> <button type="submit"
                                            class="btn btn-success add-btn"><i
                                                class="ri-add-line align-bottom me-1"></i>Thêm</button></form>
                                    <button class="btn btn-soft-danger" type="submit"
                                        onclick="return confirm('Bạn xác nhận muốn xóa tài khoản?')" hidden
                                        id="btn_delete"><i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom-dashed border-bottom">
                        <form action="{{ route('user.search') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-xl-6">
                                    <div class="search-box">
                                        <input type="text" name="kw" class="form-control search"
                                            placeholder="Nhập email...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6">
                                    <div class="row g-3">
                                        <div class="col-sm-8">
                                            <div>
                                                <select class="form-control" name="role">
                                                    <option value="" disabled>Vai trò</option>
                                                    <option value="-1" selected>Tất cả</option>
                                                    <option value="1">Người dùng</option>
                                                    <option value="0">Quản lý</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!--end col-->
                                        <!--end col-->
                                        <div class="col-sm-4">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-100"> <i
                                                        class="ri-equalizer-fill me-2 align-bottom"></i>Lọc</button>
                                            </div>
                                        </div>
                        </form>
                        <!--end col-->
                    </div>
                </div>
            </div>
            <!--end row-->
    </div>
    <div class="card-body">
        <div>
            <div class="table-responsive table-card mb-1">
                <table class="table align-middle" id="customerTable">
                    <thead class="table-light text-muted">
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check">
                                    <input class="form-check-input" onclick="check()" type="checkbox" id="checkAll">
                                </div>
                            </th>

                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đăng kí</th>
                            <th>Vai trò</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($user as $row)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="anhien()"
                                            name="checkboxes[]" value="{{ $row->id }}">
                                    </div>
                                </th>
                                <td class="customer_name">{{ $row->name }}</td>
                                <td class="email">{{ $row->email }}</td>
                                <td class="phone">{{ $row->phone }}</td>
                                <td class="date">{{ $row->created_at->format('d/m/y') }}</td>
                                @if ($row->role == 1)
                                    <td class="status"><span
                                            class="badge bg-success-subtle text-success text-uppercase">Người
                                            dùng</span>
                                    </td>
                                @else
                                    <td class="status"><span class="badge bg-danger-subtle text-danger text-uppercase">Quản
                                            lý</span>
                                    </td>
                                @endif
                                <td>
                                    <form action="/admin/user/{{ $row->id }}" method="post">
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" title="Chỉnh">
                                                <a href="/admin/user/{{ $row->id }}/edit"
                                                    class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" title="Xóa">
                                                <button type="submit" class="btn d-inline-block remove-item-btn">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </button>
                                            </li>
                                            @csrf @method('DELETE')
                                        </ul>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>{{ $user->onEachSide(5)->links() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!--end col-->
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/checkbox.js') }}"></script>
@endsection
