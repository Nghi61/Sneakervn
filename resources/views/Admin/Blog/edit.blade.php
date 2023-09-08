@extends('layouts.Admin')
@section('title')
    VnSneaker - Chỉnh sửa sản phẩm
@endsection
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
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
                <script>
                    function addNewInput() {
                        var sizeContainer = document.getElementById('sizeContainer');
                        var size = prompt('Vui lòng điền size cần thêm:');
                        if (!size || isNaN(size)) {
                            alert('Sai định dạng, vui lòng điền giá trị là số');
                            return;
                        }

                        const labels = sizeContainer.querySelectorAll('label');
                        let check = false;

                        for (let i = 0; i < labels.length; i++) {
                            const label = labels[i];
                            if (label.textContent.trim() === 'Size ' + size) {
                                alert('Size đã tồn tại!');
                                check = true; // Sửa thành check = true;
                                break; // Thêm lệnh break để thoát khỏi vòng lặp khi đã tìm thấy
                            }
                        }

                        if (!check) {
                            var newCol = document.createElement('div');
                            newCol.classList.add('col');

                            var newSizeLabel = document.createElement('label');
                            newSizeLabel.classList.add('form-label');
                            newSizeLabel.textContent = 'Size ' + size;
                            newSizeLabel.contentEditable = true;

                            var newInput = document.createElement('input');
                            newInput.type = 'number';
                            newInput.classList.add('form-control');
                            newInput.name = 'size[' + size + ']';
                            newInput.placeholder = 'Ví dụ: 10';

                            // Create a button to remove the input
                            var removeButton = document.createElement('button');
                            removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'float-end');
                            removeButton.textContent = '-';
                            removeButton.onclick = function() {
                                sizeContainer.removeChild(newCol);
                            };

                            // Create a div to hold the label and the delete button
                            var labelDiv = document.createElement('div');
                            labelDiv.appendChild(newSizeLabel);
                            labelDiv.appendChild(removeButton);

                            // Append the new elements to the container
                            newCol.appendChild(labelDiv);
                            newCol.appendChild(newInput);

                            if (size < 39) {
                                sizeContainer.insertBefore(newCol, sizeContainer.firstElementChild);
                            } else {
                                sizeContainer.insertBefore(newCol, sizeContainer.lastElementChild);
                            }
                        }

                    }

                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
                <style>
                    .image-container {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        /* Khoảng cách giữa các hình ảnh */
                    }

                    .image-container img {
                        width: 40px;
                        height: 40px;
                        object-fit: cover;
                        border: 1px solid #ccc;
                        /* Viền cho hình ảnh */
                    }
                </style>
            @endsection
