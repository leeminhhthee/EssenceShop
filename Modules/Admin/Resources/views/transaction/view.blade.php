@extends('admin::layouts.main')
@section('title', '| Chi tiết đơn hàng')
@section('content')
<div class="app-main__outer">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.get.list.transaction') }}">Đơn hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Xem chi tiết</li>
            </ol>
        </nav>
    </div>
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Đơn hàng
                    <div class="page-title-subheading">
                        Xem, cập nhật, in hóa đơn và quản lý dữ liệu.
                    </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('admin.print.order', $id) }}" target="_blank" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                       <span class="btn-icon-wrapper pr-2 opacity-7">
                          <i class="fa fa-print"></i>
                       </span>
                       In hóa đơn
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="table-responsive">
                            <h2 class="text-center">Danh sách sản phẩm</h2>
                            <hr>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center">Khuyến mãi</th>
                                        <th class="text-center">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($views as $view)
                                    <tr class="text-center">
                                        <td>{{ $i }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 80px; width: 80px; object-fit: contain"
                                                                data-toggle="tooltip" title="Image"
                                                                data-placement="bottom"
                                                                src="{{ asset(pare_url_file($view->pro_avatar))}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $view->pro_name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $view->or_qty }}
                                        </td>
                                        <td class="text-center">{{ number_format($view->or_price,'0','','.',).' VND' }}</td>
                                        <td class="text-center">
                                            {{ $view->pro_sale }} %
                                        </td>
                                        <td class="text-center">{{ number_format($view->or_price-($view->or_price*$view->pro_sale)/100,'0','','.',).' VND' }}</td>
                                    </tr>
                                    <?php $i++ ?>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>

                        <?php $i=1?>
                        <?php $total=0 ?>
                        @foreach ($views as $view)
                            @if($i==1)
                        <h2 class="text-center mt-5">Thông tin khách hàng</h2>
                            <hr>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Họ tên
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $view->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $view->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $view->tr_phone }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                Địa chỉ nhận hàng</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $view->tr_address }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="payment_type" class="col-md-3 text-md-right col-form-label">Phương thức thanh toán</label>
                            <div class="col-md-9 col-xl-8">
                                <p>Thanh toán khi nhận hàng</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-3 text-md-right col-form-label">Ghi chú đơn hàng</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $view->tr_note }}</p>
                            </div>
                        </div>
                        @endif
                        <?php  $total += $view->or_qty*($view->or_price * (100 - $view->pro_sale)/100)?>
                        <?php $i++?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
</div>

@stop
