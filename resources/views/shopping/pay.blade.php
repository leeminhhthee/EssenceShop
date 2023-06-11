@extends('layouts.app')
@section('title', '| Thanh toán')
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
                        <li class="home">
                            <a href="{{ route('get.list.shopping.cart') }}">Giỏ hàng</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Thanh toán</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
    <div class="container wrapper">
        <div class="area-title" style="margin-top: 0; margin-bottom: 20px">
            <h2>THANH TOÁN</h2>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Xem lại đơn hàng <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.shopping.cart') }}">Sửa giỏ hàng</a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach ($products as $product)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ asset(pare_url_file($product->options->avatar)) }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $product->name }}</div>
                                    <div class="col-xs-12"><small>Số lượng: {{ $product->qty }}</small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6> {{ number_format($product->price,0,',','.').' VND' }}</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>                 
                            @endforeach
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng thanh toán</strong>
                                    <div class="pull-right"> {{ Cart::subtotal(0,3) }} VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin khách hàng</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Thông tin khách hàng nhận</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tên khách hàng:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" value="{{ get_data_user('web','name') }}" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ nhận hàng:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ email:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="email_address" class="form-control" value="{{ get_data_user('web','email') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" value="{{ get_data_user('web','phone') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú cho đơn hàng:</strong></div>
                                <div class="col-md-12">
                                    <textarea name="note" class="form-control" cols="30" rows="4" placeholder="Ghi chú cho đơn hàng..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                </div>
            
            </form>
        </div>
        <div class="row cart-footer">
    
        </div>
    </div>
</div>
@stop