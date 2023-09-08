@extends('layouts.Admin')
@section('title')
    VnSneaker - Thêm sản phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="/admin/product" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Tên sản phẩm</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Ví dụ: Giày Nike AirForce 1">
                                @error('name')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="PriceProduct" class="form-label">Giá mặc định</label>
                                    <input type="number" value="{{ old('price') }}"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        placeholder="Ví dụ: 1000000">
                                    @error('price')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="SaleProduct" class="form-label">Giá giảm giá</label>
                                    <input type="number" value="{{ old('sale') }}"
                                        class="form-control  @error('price') is-invalid @enderror" name="sale"
                                        placeholder="Giá giảm giá phải thấp hơn giá mặc định">
                                    @error('sale')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-checkbox mb-4">
                                <label for="Cate" class="form-check-label">Danh
                                    mục:</label>
                                @foreach ($cate as $row)
                                    <input class="form-check-input ms-2" type="checkbox" value="{{ $row->id }}"
                                        name="idcate[]" @if (is_array(old('idcate')) && in_array($row->id, old('idcate'))) checked @endif>
                                    {{ $row->name }}
                                @endforeach
                                @error('idcate')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Quantity" class="form-label  ">Số lượng</label>
                                <input type="number" value="{{ old('quantity') }}" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" placeholder="Ví dụ: 100">
                                @error('quantity')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-3" id="sizeContainer">
                                <div class="col">
                                    <label for="SizeProduct" class="form-label">Size 39</label>
                                    <input type="number" class="form-control" value="{{ old('size.39') }}" name="size[39]"
                                        placeholder="Ví dụ: 10">
                                </div>
                                <div class="col">
                                    <label for="SizeProduct" class="form-label">Size 40</label>
                                    <input type="number" value="{{ old('size.40') }}" name="size[40]" class="form-control"
                                        placeholder="Ví dụ: 10">
                                </div>
                                <div class="col">
                                    <label for="SizeProduct" class="form-label">Size 41</label>
                                    <input type="number" value="{{ old('size.41') }}" name="size[41]" class="form-control"
                                        placeholder="Ví dụ: 10">
                                </div>
                                <div class="col">
                                    <label for="SizeProduct" class="form-label">Size 42</label>
                                    <input type="number" value="{{ old('size.42') }}" name="size[42]" class="form-control"
                                        placeholder="Ví dụ: 10">
                                </div>
                                <div class="col">
                                    <label for="SizeProduct" class="form-label">Size 43</label>
                                    <input type="number" value="{{ old('size.43') }}" name="size[43]" class="form-control"
                                        placeholder="Ví dụ: 10">
                                </div>
                                <div class="col">
                                    <button class="btn btn-lg" type="button" style="margin-top: 20px"
                                        onclick="addNewInput()">+</button>
                                </div>
                                @error('size')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Collection" class="form-label">Bộ sưu tập hình</label>
                                <input type="file" class="form-control" name="files[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="Img" class="form-label">Hình</label>
                                <input type="file" class="form-control" name="urlHinh" required>
                                @error('urlHinh')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô
                                    tả</label>
                                <textarea id="editor"name="description">{{ old('description') }} </textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
            @section('js')
                <script src="{{ asset('assets/js/produc.js') }}"></script>
                <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            @endsection
