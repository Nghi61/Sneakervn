@extends('layouts.clients')
@section('title')
VnSneaker - Tài Khoản
@endsection
@section('css')
    <link href="css/account.css" rel="stylesheet">
@endsection
@section('noidung')
<main class="bg_gray">
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="/">Trang chủ</a></li>
					<li><a href="{{ route('account') }}">Tài khoản</a></li>
				</ul>
		</div>
		<h1>Đăng nhập hoặc Đăng kí</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Đăng nhập</h3>
					<div class="form_container mt-2">
						<div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="#0" class="social_bt facebook">Đăng nhập Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="#0" class="social_bt google">Đăng nhập Google</a>
							</div>
						</div>
						<div class="divider"><span>Or</span></div>
                        <x-guest-layout>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Mật khẩu')" />

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->

                                <div class="flex justify-between mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Nhớ tài khoản') }}</span>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class=" text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('Quên mật khẩu?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="block mt-4">
                                    <x-primary-button class="ml-3">
                                        {{ __('Đăng nhập') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-guest-layout>

					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<!-- /row -->
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Thành viên mới</h3>
					<div class="form_container mt-2">
						<x-guest-layout>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Họ tên')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Mật khẩu')" />

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ml-4">
                                        {{ __('Đăng kí') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-guest-layout>

					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection

