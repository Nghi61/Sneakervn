@extends('layouts.admin')
@section('title')
    VnSneaker - Chỉnh sửa bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">

                    <h4 class="card-title mb-0 flex-grow-1">Chỉnh sửa bài viết</h4>

                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="/admin/blog/{{ $pro->id }}" method="POST" enctype="multipart/form-data">
                            @csrf {{ method_field('PUT') }}
                            <div class="mb-3">
                                <label for="ProductName" class="form-label">Tiêu đề</label>
                                <input type="text" value="{{ $pro->title}}"
                                    class="form-control @error('title') is-invalid @enderror" name="title">
                                @error('title')
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
                                @error('urlHinh')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô
                                    tả</label>
                                <textarea id="editor"name="description">{{ $pro->content }} </textarea>
                            </div>
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="view" value="{{ $pro->view }}">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
            @section('js')
                <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            @endsection
