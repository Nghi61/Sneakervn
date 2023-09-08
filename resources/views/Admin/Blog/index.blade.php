@extends('layouts.Admin')
@section('title')
    VnSneaker - Danh sách sản phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh sách sản phẩm</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="/admin/product/create" class="btn btn-success add-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> Thêm</a>
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
                                        <th >Ảnh</th>
                                        <th >Tên Sản Phẩm</th>
                                        <th >Giá</th>
                                        <th>Sale</th>
                                        <th class="text-center">Số lượng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($product as $row)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td class="img_product"><img src="{{ asset($row->urlHinh) }}"
                                                    alt=""></td>
                                            <td>{{ $row->name }}</td>
                                            <td >{{ $row->price }}</td>
                                            <td >{{ $row->sale }}</td>
                                            <td class="text-center"> {{ $row->quantity }}</td>
                                            <td>
                                                <form action="/admin/product/{{ $row->id }}" method="post">
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="/admin/product/{{ $row->id }}/edit"
                                                                class="btn btn-sm btn-success edit-item-btn">
                                                                Chỉnh
                                                            </a>
                                                        </div>
                                                        <div class="remove">
                                                            <button class="btn btn-sm btn-danger remove-item-btn"
                                                                onclick="return confirm('Xác nhận xóa {{ $row->name }}?')"
                                                                type="submit">Xóa</button>
                                                            @csrf @method('DELETE')
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>
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
