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
	</div>
	<!-- /page_header -->
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1.Thông tin cá nhân và hóa đơn</h3>

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
                                <label for="ProductName" class="form-label">Địa chỉ</label>
                                <input type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Ví dụ: Nguyễn Văn A">
                                @error('name')
                                    <p class="text-danger p-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle payments">
						<h3>2. Thanh toán và giao hàng</h3>
							<ul>
								<li>
									<label class="container_radio">Thanh toán bằng thẻ<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment" disabled>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Paypal<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment" disabled>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Trả tiền khi nhận hàng<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Chuyển khoản<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="payment" disabled>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<div class="payment_info d-none d-sm-block"><figure><img src="img/cards_all.svg" alt=""></figure>	<p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones sea.</p></div>

							<h6 class="pb-2">Phương thức giao hàng</h6>


						<ul>
								<li>
									<label class="container_radio">Giao hàng bình thường<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="shipping" checked>
										<span class="checkmark"></span>
									</label>
								</li>
								<li>
									<label class="container_radio">Giao hàng nhanh<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
										<input type="radio" name="shipping" disabled>
										<span class="checkmark"></span>
									</label>
								</li>

							</ul>

					</div>
					<!-- /step -->

				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Hóa đơn</h3>
					<div class="box_general summary">
                        @php
                        $totalAmount = 0;
                    @endphp

						<ul>
                            @if (session('cart'))
                        @foreach (session('cart') as $index => $row)
                            @php
                                $itemTotal = $row['price'] * $row['quantity'];
                                $totalAmount += $itemTotal;
                            @endphp
							<li class="clearfix"><em>{{ $row['quantity'] }}x {{ $row['name'] }} (size {{ $row['size'] }})</em>  <span> {{ number_format($row['price'] * $row['quantity'], 0, ',', '.') }}</span></li>
                            @endforeach
                            @endif
						</ul>
						<ul>
							<li class="clearfix"><em><strong>Tổng sản phẩm</strong></em>  <span>{{ number_format($totalAmount, 0, ',', '.') }}đ</span></li>
							<li class="clearfix"><em><strong>Shipping</strong></em> <span>0đ</span></li>

						</ul>
						<div class="total clearfix">Tổng <span>{{ number_format($totalAmount, 0, ',', '.') }}đ</span></div>
						<div class="form-group">
								<label class="container_check">Nhận thông tin mới nhất.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>


						<a href="{{ route('confirm') }}" class="btn_1 full-width">Xác nhận thanh toán</a>
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
@section('css')
<link href="css/checkout.css" rel="stylesheet">
@endsection
@section('javascript')
@endsection
