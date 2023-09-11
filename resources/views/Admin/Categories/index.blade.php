@extends('layouts.Admin')
@section('title')
    VnSneaker - Danh mục sản phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh mục sản phẩm</h4>
                </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    @if ($show == false)
                                        <a href="/admin/categories" class="btn btn-success add-btn"><i
                                                class="ri-add-line align-bottom me-1"></i> Thêm</a>
                                    @endif
                                    <button class="btn btn-soft-danger" type="submit"
                                        onclick="return confirm('Bạn xác nhận muốn xóa danh mục?')" hidden
                                        id="btn_delete"><i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="listjs-table" id="customerList">
                            <div class="table-responsive table-card mt-2 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" onclick="check()">
                                                </div>
                                            </th>
                                            <th>Tên danh mục</th>
                                            <th class="text-center">Số lượng sản phẩm</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <td></td>
                                            <td class="customer_name">{{ $cate[0]->name }}</td>
                                            <td class="text-center">{{ $cate[0]->quantity }}</td>
                                            <td></td>
                                        </tr>
                                        @for ($i = 1; $i < count($cate); $i++)
                                            @php
                                                $row = $cate[$i];
                                            @endphp
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" onclick="anhien()"
                                                            name="checkboxes[]" value="{{ $row->id }}">
                                                    </div>
                                                </th>
                                                <td>{{ $row->name }}</td>
                                                <td class="text-center">{{ $row->quantity }}</td>
                                                <td>
                                                    <form action="/admin/categories/{{ $row->id }}" method="post">
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <a href="/admin/categories/{{ $row->id }}/edit"
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
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end card -->
                    </div>
                <!-- end col -->
            </div>
        </div>

        <div class="col-lg-6">
            @if ($show)
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thêm danh mục</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/categories" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="NameCategories" class="form-label">Tên danh mục</label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Ví dụ: Giày tập luyện">
                                    @error('name')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="SlugCategories" class="form-label">Slug</label>
                                    <input type="text" value="{{ old('slug') }}"
                                        class="form-control @error('slug') is-invalid @enderror" name="slug"
                                        placeholder="Ví dụ: giay-tap-luyen">
                                    @error('slug')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Chỉnh sửa danh mục</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/categories/{{ $ce->id }}" method="POST">
                                @csrf {{ method_field('PUT') }}
                                <div class="mb-3">
                                    <label for="NameCategories" class="form-label">Tên danh mục</label>
                                    <input type="text" value="{{ $ce->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="SlugCategories" class="form-label">Slug</label>
                                    <input type="text" value="{{ $ce->slug }}"
                                        class="form-control @error('slug') is-invalid @enderror" name="slug">
                                    @error('slug')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <!-- end col -->
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/checkbox.js') }}"></script>
@endsection
