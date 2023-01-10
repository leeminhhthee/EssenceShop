@extends('admin::layouts.main')
@section('title', '| Thêm sản phẩm')
@section('content')
<style>
   .rating .active{
      color: #ff9705 !important;
   }
</style>
<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
         <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
          <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
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
                  Sản phẩm
                  <div class="page-title-subheading">
                     Xem, tạo, cập nhật, xóa và quản lý dữ liệu.
                  </div>
                  </div>
               </div>

            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">

                  @include('admin::product.form')

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop