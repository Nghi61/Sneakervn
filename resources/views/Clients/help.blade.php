@extends('layouts.Clients')
@section('noidung')
<main class="bg_gray">
	<div class="container margin_90_65">
		<div class="main_title">
			<h1>Trung tâm hỗ trợ</h1>
			<p>Bạn cần hỗ trợ gì?</p>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="search-input white">
					<input type="text" placeholder="Tìm kiếm vấn đề...">
					<button type="submit"><i class="ti-search"></i></button>
				</div>
				<!-- /search-input -->
			</div>
		</div>
	</div>
	<!-- /container -->

		<div class="bg_white">
			<div class="container margin_90_65">
				<div class="main_title">
					<h2>Những vấn đề thường gặp</h2>
				</div>

				<div class="row">
					<div class="col-md-6">
						<a class="box_topic_2" href="#0">
						<i class="ti-wallet"></i>
						<h3>Thanh toán</h3>
						<p>Eu qui mundi lucilius petentium, mea amet libris prodesset in, ei unum delectus vituperata eum. Ne usu omittam menandri.</p>
					</a>
					</div>
					<div class="col-md-6">
						<a class="box_topic_2" href="#0">
						<i class="ti-user"></i>
						<h3>Tài khoản</h3>
						<p>Eu qui mundi lucilius petentium, mea amet libris prodesset in, ei unum delectus vituperata eum. Ne usu omittam menandri.</p>
					</a>
					</div>
				</div>
				<!-- /row -->

				<div class="row">
					<div class="col-md-6">
						<a class="box_topic_2" href="#0">
						<i class="ti-help"></i>
						<h3>Hỗ trợ</h3>
						<p>Eu qui mundi lucilius petentium, mea amet libris prodesset in, ei unum delectus vituperata eum. Ne usu omittam menandri.</p>
					</a>
					</div>
					<div class="col-md-6">
						<a class="box_topic_2" href="#0">
						<i class="ti-truck"></i>
						<h3>Giao hàng</h3>
						<p>Eu qui mundi lucilius petentium, mea amet libris prodesset in, ei unum delectus vituperata eum. Ne usu omittam menandri.</p>
					</a>
					</div>
				</div>
				<!-- /row -->

				<div class="row">
					<div class="col-md-6">
						<a class="box_topic_2" href="#0">
						<i class="ti-eraser"></i>
						<h3>Hoàn tiền</h3>
						<p>Eu qui mundi lucilius petentium, mea amet libris prodesset in, ei unum delectus vituperata eum. Ne usu omittam menandri.</p>
					</a>
					</div>
					<div class="col-md-6">
						<a class="box_topic_2" href="#0">
						<i class="ti-comments"></i>
						<h3>Bình luận</h3>
						<p>Eu qui mundi lucilius petentium, mea amet libris prodesset in, ei unum delectus vituperata eum. Ne usu omittam menandri.</p>
					</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>
@endsection
@section('css')
<link href="css/faq.css" rel="stylesheet">
@endsection
