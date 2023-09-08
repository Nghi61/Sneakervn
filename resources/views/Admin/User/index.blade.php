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
                                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                                <button type="button" class="btn btn-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i>Thêm</button>
                                <button type="button" class="btn btn-info"><i
                                        class="ri-file-download-line align-bottom me-1"></i>Xuất danh sách</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-xl-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search" placeholder="Tìm kiếm...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xl-6">
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="">
                                            <input type="text" class="form-control" id="datepicker-range"
                                                data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                                placeholder="Tìm kiếm ngày">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-4">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                data-choices-search-false name="choices-single-default" id="idStatus">
                                                <option value="">Vai trò</option>
                                                <option value="all" selected>Tất cả</option>
                                                <option value="Active">Người dùng</option>
                                                <option value="Block">Quản lý</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-sm-4">
                                        <div>
                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i
                                                    class="ri-equalizer-fill me-2 align-bottom"></i>Lọc</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-1">
                            <table class="table align-middle" id="customerTable">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>

                                        <th class="sort" data-sort="customer_name">Họ tên</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Số điện thoại</th>
                                        <th class="sort" data-sort="date">Ngày đăng kí</th>
                                        <th class="sort" data-sort="status">Vai trò</th>
                                        <th class="sort" data-sort="action">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($user as $row)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="customer_name">{{ $row->name }}</td>
                                            <td class="email">{{ $row->email }}</td>
                                            <td class="phone">{{ $row->phone }}</td>
                                            <td class="date">{{ $row->created_at->format('d/m/y')}}</td>
                                            @if($row->role==1)
                                            <td class="status"><span
                                                    class="badge bg-success-subtle text-success text-uppercase">Người dùng</span>
                                            </td>
                                            @else
                                            <td class="status"><span
                                                class="badge bg-danger-subtle text-danger text-uppercase">Quản lý</span>
                                        </td>
                                        @endif
                                            <td>
                                                <form action="/admin/user/{{ $row->id }}" method="post">
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                            title="Chỉnh">
                                                            <a href="/admin/user/{{ $row->id }}/edit"
                                                                class="text-primary d-inline-block edit-item-btn">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item"
                                                            data-bs-toggle="tooltip"title="Xóa">
                                                            <button type="submit"
                                                                class="btn d-inline-block remove-item-btn">
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
                                            <td>{{ $user->onEachSide(10)->links()}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end modal -->
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
@endsection
