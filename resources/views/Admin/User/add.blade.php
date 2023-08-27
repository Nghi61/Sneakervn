@extends('layouts.Admin')
@section('title')
    VnSneaker - Thêm tài khoản
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm tài khoản</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="/admin/user" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Họ tên</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Ví dụ: Nguyễn Văn A">
                                @error('name')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Ví dụ: abc@example.com">
                                    @error('email')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Phone" class="form-label">Số điện thoại</label>
                                    <input type="number" value="{{ old('phone') }}"
                                        class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                        placeholder="01234xxx">
                                    @error('phone')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Mật khẩu</label>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Hình đại diện</label>
                                <input type="file" class="form-control" name="avatar">
                                @error('avatar')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="gender" class="form-label">Giới tính</label>
                                    <select name="gender" class="form-select">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Date" class="form-label">Ngày sinh</label>
                                    <input type="date" value="{{ old('date') }}"
                                        class="form-control  @error('date') is-invalid @enderror" name="date">
                                    @error('date')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Role" class="form-label">Vai trò</label>
                                <select name="role" class="form-select">
                                    <option value="1">Người dùng</option>
                                    <option value="0">Quản lý</option>
                                </select>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
