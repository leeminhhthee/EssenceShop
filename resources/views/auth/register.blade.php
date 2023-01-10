@extends('layouts.app')
@section('title', '| Đăng ký')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Đăng ký</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<!-- account-details Area Start -->
<div class="customer-login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="customer-register my-account">
                    <form method="post" class="register" action="">
                        @csrf
                        <div class="form-fields">
                            <h2>Đăng ký tài khoản</h2>
                            <p class="form-row form-row-wide">
                                <label for="email">Họ tên <span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="name" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="email">Địa chỉ Email <span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" id="email" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="phone">Số điện thoại <span class="required">*</span></label>
                                <input type="text" class="input-text" name="phone" id="phone" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Mật khẩu <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="password">
                            </p>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" name="register" value="Đăng ký">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop