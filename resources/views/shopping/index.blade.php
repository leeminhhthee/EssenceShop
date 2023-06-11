@extends('layouts.app')
@section('title', '| Giỏ hàng của bạn')
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
                        <li class="category3"><span>Giỏ hàng</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
    <div class="container">
        <div class="area-title" style="margin-top: 0; margin-bottom: 20px">
            <h2>Giỏ hàng của bạn</h2>
        </div>
        <!-- Shopping Cart Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td><a href="">{{ $i }}</a></td>
                                <td>
                                    <a href="{{ route('get.detail.product', [$product->options->slug, $product->id]) }}"><img src="{{ asset(pare_url_file($product->options->avatar)) }}" class="" alt=""/></a>
                                </td>
                                <td>
                                    <a href="{{ route('get.detail.product', [$product->options->slug, $product->id]) }}"><h6>{{ $product->name }}</h6></a>
                                    
                                </td>
                                <td>
                                    <div class="cart-price">{{ number_format($product->price,'0','','.',).' VND' }}</div>
                                </td>
                                <td>
                                    <form>
                                        <input type="number" placeholder="1" min="1" value="{{ $product->qty }}" name="qty" disabled>
                                        <a href="{{ route('decreaseQty.shopping.cart', [$product->rowId]) }}" class="btn btn-actions-pane-left" style="background-color: rgb(172, 163, 163); color: black; font-size: 20px;width: 37px;height: 40px;position: absolute;margin-left: -110px">-</a>
                                        <a href="{{ route('increaseQty.shopping.cart', [$product->rowId]) }}" class="btn btn-actions-pane-left" style="background-color: rgb(172, 163, 163); color: black; font-size: 20px;height: 40px;position: absolute;margin-left: -20px">+</a>
                                    </form>
                                </td>
                                <td>
                                    <div class="cart-subtotal">{{ number_format($product->qty * $product->price,'0','','.',).' VND' }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('delete.shopping.cart', $key) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            <tr>
                                <td class="actions-crt" colspan="5"><h4>Tổng tiền cần thanh toán</h4></td>
                                <td class="actions-crt" colspan="2">
                                    <h5>{{ Cart::subtotal(0, 3) }} VND</h5>
                                </td>
                            </tr>
                            <tr><?php
                                $total = Cart::subtotal(0, 3);   
                                ?>
                                @if ( $total > 0)
                                <td class="actions-crt" colspan="5"><h4>Thanh toán đơn hàng</h4></td>
                                <td class="actions-crt" colspan="2">
                                    <div class="">
                                        <div class=" align-right"><a class="cbtn" href="{{ route('get.form.pay') }}"><i class="fa fa-mouse-pointer"></i> Click here</a></div>
                                    </div>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-6 col-sm-6 col-xs-6 align-left"><a class="cbtn" href="{{ route('home') }}">Tiếp tục mua sắm</a></div>
                                        {{-- <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">UPDATE SHOPPING CART</a></div> --}}
                                        <div class="col-md-6 col-sm-6 col-xs-6 align-right"><a class="cbtn" href="{{ route('destroy.shopping.cart') }}">XÓA GIỎ HÀNG</a></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Shopping Cart Table -->
    </div>
</div>
@stop