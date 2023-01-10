@extends('admin::layouts.main')
@section('title', '| Đơn hàng')
@section('content')

<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.transaction') }}">Đơn hàng</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dữ liệu</li>
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
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="main-card mb-3 card">

               <div class="table-responsive">
                  <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                     <thead>
                           <tr>
                              <th class="text-center">ID</th>
                              <th>Tên khách hàng</th>
                              <th class="text-center" style="width: 300px">Địa chỉ giao hàng</th>
                              <th class="text-center">Số điện thoại</th>
                              <th class="text-center">Tổng tiền</th>
                              <th class="text-center">Ngày tạo</th>
                              <th class="text-center">Trạng thái</th>
                              <th class="text-center">Thao tác</th>
                           </tr>
                     </thead>
                     <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                           <td class="text-center text-muted">#{{ $transaction->id }}</td>
                           <td>
                              <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                       <div class="widget-content-left flex2">
                                          <div class="widget-heading">{{ isset($transaction->user->name) ? $transaction->user->name: '[N\A]' }}</div>
                                       </div>
                                    </div>
                              </div>
                           </td>
                           <td class="text-center">{{ $transaction->tr_address }}</td>
                           <td class="text-center">{{ $transaction->tr_phone }}</td>
                           <td class="text-center">{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                           <td class="text-center">{{ $transaction->created_at->format('d-m-Y h:i:s A') }}</td>
                           <td class="text-center">
                              @if ($transaction->tr_status == 1)
                                 <a href="" class="badge badge-success" style="color: white">Đã xong</a>
                              @else
                                 <a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="badge badge-dark" style="color: white">Chưa xử lý</a>
                              @endif
                           </td>
                           <td class="text-center">
                              <a href="{{ route('admin.get.view.order', $transaction->id) }}"
                                    class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                    Chi tiết
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>

               <div class="d-block card-footer">
                  {{ $transactions->links() }}
               </div>

            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop
