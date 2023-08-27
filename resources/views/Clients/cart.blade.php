@extends('layouts.Clients')
@section('noidung')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <h1>Giỏ hàng</h1>
            </div>
                <!-- /page_header -->
                <table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>
                                Sản phẩm
                            </th>
                            <th>
                                Giá
                            </th>
                            <th>
                                Size
                            </th>
                            <th>
                                Số lượng
                            </th>

                            <th colspan="2">
                                Tổng tiền
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalAmount = 0;
                        @endphp
                        @if (session('cart'))
                            @foreach (session('cart') as $index => $row)
                                @php
                                    $itemTotal = $row['price'] * $row['quantity'];
                                    $totalAmount += $itemTotal;
                                @endphp
                                <tr data-index="{{ $index }}">
                                    <td>
                                        <div class="thumb_cart">
                                            <img src="img/products/product_placeholder_square_small.jpg"
                                                data-src="{{ asset($row['urlHinh']) }}" class="lazy" alt="Image">
                                        </div>
                                        <span class="item_cart">{{ $row['name'] }}</span>
                                    </td>
                                    <td class="price">
                                        <strong>{{ $row['price'] }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $row['size'] }}</strong>
                                    </td>
                                    <td>
                                        <div class="quantity-control">
                                            <button type="button" class="qty-btn dec">-</button>
                                            <input type="number" value="{{ $row['quantity'] }}" class="qty"
                                                name="quantity">
                                            <button type="button" class="qty-btn inc">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <strong class="item-total" id="item-total-{{ $loop->index }}">
                                            {{ number_format($row['price'] * $row['quantity'], 0, ',', '.') }}đ
                                        </strong>
                                    </td>
                                    <td class="options">
                                        <a href="{{ route('cart.delete', ['id' => $row['idProduct']]) }}"><i
                                                class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-end">
                        <button type="button" class="btn_1 gray">Cập nhật giỏ hàng</button>
                    </div>
                    <div class="col-sm-8">
                        <div class="apply-coupon">
                            <div class="form-group">
                                <div class="row g-2">
                                    <div class="col-md-6"><input type="text" name="coupon-code" value=""
                                            placeholder="Nhập mã giảm giá" class="form-control"></div>
                                    <div class="col-md-4"><button type="button" class="btn_1 outline">Áp dụng mã giảm
                                            giá</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /cart_actions -->

        </div>
        <!-- /container -->

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Tổng</span>
                                <p id="total-amount">{{ number_format($totalAmount, 0, ',', '.') }}đ</p>
                            </li>
                        </ul>
                        <form id="checkout-form">
                            <button type="submit" class="btn_1 full-width cart">Thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.quantity-control .qty-btn').on('click', function() {
                    var row = $(this).closest('tr'); // Dòng chứa sản phẩm tương ứng
                    var index = row.data('index'); // Chỉ số của sản phẩm trong mảng session

                    var quantityField = row.find('.qty');
                    var newQuantity = parseInt(quantityField.val());

                    if ($(this).hasClass('dec')) {
                        newQuantity = newQuantity - 1;
                    } else {
                        newQuantity = newQuantity + 1;
                    }

                    // Giới hạn số lượng không nhỏ hơn 1
                    newQuantity = Math.max(1, newQuantity);

                    quantityField.val(newQuantity);

                    updateItemTotal(index, newQuantity);
                    updateTotal();
                });

                function updateItemTotal(index, quantity) {
                    var price = {{ $row['price'] }}; // Giá cố định của sản phẩm (đổi nếu cần)
                    var itemTotal = price * quantity;

                    // Cập nhật số tiền của sản phẩm tương ứng
                    $('#item-total-' + index).text(formatCurrency(itemTotal));
                }


                function updateTotal() {
                    var totalAmount = 0;

                    $('.qty').each(function() {
                        var index = $(this).closest('tr').data('index');
                        var quantity = parseInt($(this).val());
                        var price = {{ $row['price'] }}; // Giá cố định của sản phẩm (đổi nếu cần)

                        var itemTotal = price * quantity;
                        totalAmount += itemTotal;
                    });

                    // Cập nhật tổng số tiền trong view
                    $('#total-amount').text(formatCurrency(totalAmount));
                }

                // Hàm định dạng số tiền thành chuỗi có định dạng
                function formatCurrency(amount) {
                    return amount.toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    });
                }

                // Gọi hàm cập nhật tổng số tiền lúc tải trang
                updateTotal();
            });
            $(document).ready(function() {
    $('#checkout-form').on('submit', function(e) {
        e.preventDefault();

        var updatedCart = []; // Mảng chứa thông tin sản phẩm đã thay đổi
        $('.quantity-control').each(function() {
            var row = $(this).closest('tr');
            var index = row.data('index');
            var quantity = parseInt(row.find('.qty').val());

            updatedCart.push({
                index: index,
                quantity: quantity
            });
        });

        // Gửi dữ liệu lên máy chủ bằng AJAX
        $.ajax({
            type: 'POST',
            url: '{{ route("checkout") }}',
            data: {
                new_cart: updatedCart,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
                window.location.href = '{{ route("checkout.view") }}';
                // Thực hiện các thao tác tiếp theo sau khi lưu session mới
            },
            error: function(error) {
                console.log(error);
                alert('Có lỗi xảy ra khi lưu dữ liệu.');
            }
        });
    });
});

        </script>



        <style>
            .quantity-control {
                display: flex;
                align-items: center;
            }

            .qty {
                width: 50px;
                padding: 5px;
                text-align: center;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .qty-btn {
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bold;
                padding: 5px 10px;
                transition: background-color 0.2s ease;
            }

            .qty-btn:hover {
                background-color: #0056b3;
            }

            .dec {
                margin-right: 5px;
            }

            .inc {
                margin-left: 5px;
            }
        </style>
    </main>



@endsection

@section('css')
    <link href="css/cart.css" rel="stylesheet">
@endsection
