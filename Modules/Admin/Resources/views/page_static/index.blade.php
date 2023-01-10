@extends('admin::layouts.main')
@section('title', '| Trang tĩnh')
@section('content')

<div class="app-main__outer">
   <div class="page-header">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.page_static') }}">Trang tĩnh</a></li>
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
                  Trang tĩnh
                  <div class="page-title-subheading">
                     Xem, tạo, cập nhật, xóa và quản lý dữ liệu.
                  </div>
                  </div>
               </div>

               <div class="page-title-actions">
                  <a href="{{ route('admin.get.create.page_static') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                       <span class="btn-icon-wrapper pr-2 opacity-7">
                           <i class="fa fa-plus fa-w-20"></i>
                       </span>
                       Tạo mới
                  </a>
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
                              <th style="width: 250px">Loại trang</th>
                              <th style="width: 300px">Tiêu đề trang</th>
                              <th class="text-center" style="width: 250px">Ngày tạo</th>
                              <th class="text-center">Thao tác</th>
                           </tr>
                        </thead>

                        <tbody>
                           @if (isset($pages))
                           @foreach ($pages as $page)
                           <tr>
                              <td class="text-center">{{ $page->id }}</td>
                              <td>{{ $page->ps_type }}</td>
                              <td>{{ $page->ps_name }}</td>
                              <td class="text-center">
                                 {{ $page->created_at }}
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.edit.page_static', $page->id) }}" data-toggle="tooltip" title="Edit"
                                    data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                    <span class="btn-icon-wrapper opacity-8">
                                       <i class="fa fa-edit fa-w-20"></i>
                                    </span>
                                 </a>
                                 <form class="d-inline" action="" method="post">
                                    <a href="{{ route('admin.get.action.page_static', ['delete', $page->id]) }}"
                                       onclick="return confirm('Do you really want to delete this item?')">
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
                     {{ $pages->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop