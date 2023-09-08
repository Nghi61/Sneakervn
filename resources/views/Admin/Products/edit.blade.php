@extends('layouts.Admin')
@section('title')
    VnSneaker - Chỉnh sửa sản phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">

                    <h4 class="card-title mb-0 flex-grow-1">Chỉnh sửa sản phẩm</h4>

                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="/admin/product/{{ $pro->id }}" method="POST" enctype="multipart/form-data">
                            @csrf {{ method_field('PUT') }}
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Tên sản phẩm</label>
                                <input type="text" value="{{ $pro->name }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Ví dụ: Giày Nike AirForce 1">
                                @error('name')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="PriceProduct" class="form-label">Giá mặc định</label>
                                    <input type="number" value="{{ $pro->price }}"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        placeholder="Ví dụ: 1000000">
                                    @error('price')
                                        <p class="text-danger p-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="SaleProduct" class="form-label">Giá giảm giá</label>
                                    <input type="number" value="{{ $pro->sale }}"
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
                                        name="idcate[]"
                                        @foreach ($productcate as $check)
                                               @if ($check->idProduct == $pro->id && $check->idCategories == $row->id) checked @endif @endforeach>
                                    {{ $row->name }}
                                @endforeach

                                @error('idcate')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Quantity" class="form-label  ">Số lượng</label>
                                <input type="number" value={{ $pro->quantity }} name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" placeholder="Ví dụ: 100">
                                @error('quantity')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-3" id="sizeContainer">
                                @foreach ($size as $sizeItem)
                                    <div class="col">
                                        <label for="SizeProduct" class="form-label">Size {{ $sizeItem->size }}</label>
                                        <input type="number" value="{{ $sizeItem->quantity }}"
                                            name="size[{{ $sizeItem->size }}]" class="form-control"
                                            placeholder="Ví dụ: 10">
                                    </div>
                                @endforeach
                                <div class="col">
                                    <button class="btn btn-lg" type="button" style="margin-top: 20px"
                                        onclick="addNewInput()">+</button>
                                </div>
                                @error('size')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Collection" class="form-label">Hình cũ</label>
                                <div class="image-container mb-3">
                                    <img src="{{ asset($pro->urlHinh) }}" alt="">
                                </div>
                                <label for="Img" class="form-label">Hình Mới</label>
                                <input type="file" class="form-control" name="urlHinh">
                                @error('files')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @if (!$img->isEmpty())
                                    <label for="Img" class="form-label">Bộ sưu tập</label>
                                    <div class="image-container mb-3">
                                        @foreach ($img as $row)
                                            <img src="{{ asset($row->urlHinh) }}" alt="">
                                        @endforeach
                                    </div>
                                    <p><a class="text-primary" href="">Quản lý bộ sưu tập</a></p>
                                @endif
                                <label for="Img" class="form-label">Thêm ảnh vào bộ sưu tập</label>
                                <input type="file" class="form-control" name="files[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô
                                    tả</label>
                                <textarea id="editor"name="description">{{ $pro->description }} </textarea>
                            </div>
                            <input type="hidden" name="view" value="{{ $pro->view }}">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Lưu</button>
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
