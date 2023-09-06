@extends('layouts.Clients')
@section('css')
    <link href="{{ asset('css/listing.css') }}" rel="stylesheet">
@endsection
@section('noidung')
    <main>
        <div class="container margin_30">
            <div class="row">
                <aside class="col-lg-3" id="sidebar_fixed">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="filter_col">
                            <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                            <div class="filter_type version_2">
                                <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Danh mục</a></h4>
                                <div class="collapse show" id="filter_1">
                                    <ul>
                                        @foreach ($Categories as $row)
                                            <li>
                                                <label class="container_check">
                                                    {{ $row->name }}<small>{{ $row->quantity }}</small>
                                                    <input name="idCategories" value="{{$row->id}}" type="checkbox" class="category-checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /filter_type -->
                            </div>
                            <div class="filter_type version_2">
                                <h4><a href="#filter_3" data-bs-toggle="collapse" class="closed">Size</a></h4>
                                <div class="collapse" id="filter_3">
                                    <ul>
                                        @foreach ($sizes as $row)
                                            <li>
                                                <label class="container_check">{{ $row->size }}<small></small>
                                                    <input type="checkbox" class="size-checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- /filter_type -->
                            <div class="filter_type version_2">
                                <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Giá</a></h4>
                                <div class="collapse" id="filter_4">
                                    <ul>
                                        <li>
                                            <label class="container_check">{{ number_format(500000, 0, ',', '.') }}đ —
                                                {{ number_format(1000000, 0, ',', '.') }}đ
                                                <input type="checkbox" class="price-checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="container_check">{{ number_format(1000000, 0, ',', '.') }}đ —
                                                {{ number_format(5000000, 0, ',', '.') }}đ
                                                <input type="checkbox" class="price-checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="container_check">{{ number_format(5000000, 0, ',', '.') }}đ —
                                                {{ number_format(10000000, 0, ',', '.') }}đ
                                                <input type="checkbox" class="price-checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="container_check">{{ number_format(10000000, 0, ',', '.') }}đ —
                                                {{ number_format(20000000, 0, ',', '.') }}đ
                                                <input type="checkbox" class="price-checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /filter_type -->
                            <div class="buttons">
                                <button type="submit" class="btn_1">Lọc</button> <a href="#0" class="btn_1 gray">Xóa</a>
                            </div>
                        </div>
                    </form>
                </aside>
                <!-- /col -->
                <div class="col-lg-9">
                    <!-- /toolbox -->
                    @if(count($product)==0)
                    <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                        <div class="text-center">
                            <h4>Không tìm thấy kết quả cho <span class="h3 text-danger">{{$kw}}</span></h4>
                            <a href="/" class="btn btn-danger mt-3"><i class="ti-arrow-left"></i> Quay trở lại trang chủ</a>
                        </div>
                    </div>
                    @else
                    @foreach ($product as $row)
                            <div class="row row_item">
                                <div class="col-sm-4">
                                    <form action="{{ route('cart') }}" method="post">
                                        @csrf
                                        <figure>
                                            @if ($row->sale > 0 && (($row->price - $row->sale) / $row->price) * 100 > 0)
                                                <span
                                                    class="ribbon off">{{ round((($row->price - $row->sale) / $row->price) * 100) }}%</span>
                                            @else
                                                <span class="ribbon new">New</span>
                                            @endif
                                            <a href="/product/detail/{{$row->id}}">
                                                <img class="img-fluid lazy"
                                                    src="img/products/product_placeholder_square_medium.jpg"
                                                    data-src="{{ asset($row->urlHinh) }}" alt="">
                                            </a>
                                        </figure>
                                </div>
                                <div class="col-sm-8">
                                    <a href="/product/detail/{{$row->id}}">
                                        <h3>{{ $row->name }}</h3>
                                    </a>
                                    @if (is_null($row->description))
                                        <p>Đang cập nhật..</p>
                                    @else
                                        <p>{{ $row->description }}</p>
                                    @endif
                                    <div class="price_box">
                                        @if ($row->sale > 0)
                                            <span class="new_price">{{ number_format($row->sale, 0, ',', '.') }}đ</span>
                                        @else
                                            <span class="new_price">{{ number_format($row->price, 0, ',', '.') }}đ</span>
                                        @endif
                                    </div>
                                    <ul>
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="size" value="39">
                                        <li><button type="submit" class="btn_1">Thêm vào giỏ hàng</button></li>
                                        <li><a href="#0" class="btn_1 gray tooltip-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Add to favorites"><i
                                                    class="ti-heart"></i><span>Thêm vào sản phẩm yêu thích</span></a>
                                        </li>
                                    </ul>
                                    </form>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <script>
        const checkboxes = document.querySelectorAll('.category-checkbox');
        let selectedCount = 0;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    if (selectedCount < 2) {
                        selectedCount++;
                    } else {
                        this.checked = false;
                    }
                } else {
                    selectedCount--;
                }
            });
        });
        const checkboxes1 = document.querySelectorAll('.size-checkbox');
        let selectedCount1 = 0;

        checkboxes1.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    if (selectedCount1 < 1) {
                        selectedCount1++;
                    } else {
                        this.checked = false;
                    }
                } else {
                    selectedCount1--;
                }
            });
        });
        const checkboxes2 = document.querySelectorAll('.price-checkbox');
        let selectedCount2 = 0;

        checkboxes2.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    if (selectedCount2 < 1) {
                        selectedCount2++;
                    } else {
                        this.checked = false;
                    }
                } else {
                    selectedCount2--;
                }
            });
        });
    </script>

@endsection
