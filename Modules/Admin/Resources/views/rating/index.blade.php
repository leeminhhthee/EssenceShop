@extends('admin::layouts.main')
@section('title', '| Đánh giá')
@section('content')
<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.rating') }}">Đánh giá</a></li>
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
                     Quản lý đánh giá sản phẩm
                     <div class="page-title-subheading">
                        Xem, xóa và quản lý dữ liệu.
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
                           <th>Sản phẩm</th>
                           <th>Tên người dùng</th>
                           <th>Nội dung</th>
                           <th class="text-center">Số sao</th>
                           <th class="text-center">Thao tác</th>
                           </tr>
                     </thead>
                     <tbody>
                        @if (isset($ratings))
                        @foreach ($ratings as $rating)
                        <tr>
                           <td class="text-center text-muted">{{ $rating->id }}</td>
                           <td>
                              <div class="widget-content p-0">
                                  <div class="widget-content-wrapper">
                                      <div class="widget-content-left mr-3">
                                          <div class="widget-content-left">
                                              <img style="height: 60px;width: 60px;object-fit: cover;"
                                                  data-toggle="tooltip" title="product"
                                                  data-placement="bottom"
                                                  src="{{ asset(pare_url_file($rating->product->pro_avatar)) }}" alt="">
                                          </div>
                                      </div>
                                      <div class="widget-content-left flex2">
                                          <div class="widget-heading">{{ $rating->created_at }}</div>
                                          <div class="widget-subheading opacity-7">
                                             <a href="{{ route('get.detail.product',[$rating->product->pro_slug, $rating->product->id]) }}" target="_blank">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                           <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                           <td>{{ $rating->ra_content }}</td>
                           <td class="text-center">{{ $rating->ra_number }} <i class="fa fa-star" style="color: #ff9705"></i></td>
                           <td class="text-center">
                              <form class="d-inline" action="" method="post">
                                 <a href="{{ route('admin.get.action.rating', ['delete', $rating->id]) }}" onclick="return confirm('Bạn có thực sự muốn xóa mục này?')">
                                    <span class="btn-icon-wrapper opacity-8">
                                       <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                                 </a>
                           </form>
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>

               <div class="d-block card-footer">
               {{ $ratings->links() }}
               </div>

            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop