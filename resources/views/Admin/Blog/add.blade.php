@extends('layouts.Admin')
@section('title')
    VnSneaker - Thêm bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm bài viết</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="/admin/blog" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="TitleBlog" class="form-label">Tiêu đề</label>
                                <input type="text" value="{{ old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Ví dụ: Giày Nike AirForce 1">
                                @error('title')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
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
                                <textarea id="editor"name="content">{{ old('content') }} </textarea>
                            </div>
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
