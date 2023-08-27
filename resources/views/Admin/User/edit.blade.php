@extends('layouts.Admin')
@section('title')
    VnSneaker - Chỉnh sửa tài khoản
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chỉnh sửa tài khoản</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="/admin/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                            @csrf {{ method_field('PUT') }}
                            <div class="mb-3">
                                <label for="UserNam" class="form-label">Họ tên</label>
                                <input type="text" value="{{ $user->name }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" value="{{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Ví dụ: abc@example.com">
                                    @error('email')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Phone" class="form-label">Số điện thoại</label>
                                    <input type="number" value="{{ $user->phone }}"
                                        class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                        placeholder="01234xxx">
                                    @error('phone')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Mật khẩu</label>
                                <input type="password" value='{{$user->password}}' name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Img" class="form-label">Hình đại diện cũ</label>
                                @if (is_null($user->avatar))
                                    <img class="img_product" src="{{ asset('img/avatar/default.jpg') }}" alt="">
                                @else
                                    <img class="img-thumbnail" src="{{ asset($user->avatar) }}" alt="">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Hình đại diện mới</label>
                                <input type="file" class="form-control" name="avatar">
                                @error('avatar')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="gender" class="form-label">Giới tính</label>
                                    <select name="gender" class="form-control">
                                        @if ($user->gender == 0)
                                            <option value="0" selected>Nam</option>
                                            <option value="1">Nữ</option>
                                        @else
                                            <option value="0">Nam</option>
                                            <option value="1" selected>Nữ</option>
                                        @endif

                                    </select>
                                    @error('gender')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Date" class="form-label">Ngày sinh</label>
                                    <input type="date" value="{{ $user->birthday }}"
                                        class="form-control  @error('date') is-invalid @enderror" name="date">
                                    @error('date')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Role" class="form-label">Vai trò</label>
                                <select name="role" class="form-control">
                                    @if ($user->role == 0)
                                        <option value="0" selected>Quản lý</option>
                                        <option value="1">Người dùng</option>
                                    @else
                                        <option value="0">Quản lý</option>
                                        <option value="1" selected>Người dùng</option>
                                    @endif

                                </select>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
                <style>
                    img {
                        width: 50px;

                    }
                </style>
            @endsection
