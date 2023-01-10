@extends('admin::layouts.main')
@section('title', '| Bài viết')
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
          <li class="breadcrumb-item"><a href="{{ route('admin.get.list.article') }}">Tin tức & Sự kiện</a></li>
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
                  Các bài báo, Tin tức & Sự kiện
                  <div class="page-title-subheading">
                     Xem, tạo, cập nhật, xóa và quản lý dữ liệu.
                  </div>
                  </div>
               </div>

               <div class="page-title-actions">
                  <a href="{{ route('admin.get.create.article') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
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

                  <div class="card-header">
                     <form>
                        <div class="input-group">
                           <input type="search" placeholder="Tìm kiếm..." name="name" value="{{ \Request::get('name') }}"
                                 class="form-control">
                           <span class="input-group-append">
                              <button type="submit" class="btn btn-primary">
                                 <i class="fa fa-search"></i>&nbsp;
                                 Search
                              </button>
                           </span>
                        </div>
                     </form>
                  </div>

                  <div class="table-responsive">
                     <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                           <tr>
                              <th class="text-center">ID</th>
                              <th style="width: 250px">Tên bài viết</th>
                              <th class="text-center">Hình ảnh</th>
                              <th class="text-center" style="width: 400px">Mô tả ngắn</th>
                              <th class="text-center">Nổi bật</th>
                              <th class="text-center"style="width: 100px">Trạng thái</th>
                              <th>Ngày tạo</th>
                              <th class="text-center">Thao tác</th>
                           </tr>
                        </thead>

                        <tbody>
                           @if (isset($articles))
                           @foreach ($articles as $article)
                           <tr>
                              <td class="text-center text-muted">#{{ $article->id }}</td>
                              <td><p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 2;  /* số dòng hiển thị */
                                 -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $article->a_name}}</p></td>
                              <td class="text-center" style="width: 105px;">
                                 <img src="{{ asset(pare_url_file($article->a_avater)) }}" alt="" class="img img-responsive" style="width: 100%">
                              </td>
                              <td><p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 2;  /* số dòng hiển thị */
                                 -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $article->a_description}}<p></td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.article', ['hot', $article->id]) }}" class="badge {{ $article->getHot($article->a_hot)['class'] }}">{{ $article->getHot($article->a_hot)['name'] }}</a>
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.action.article', ['active', $article->id]) }}" class="badge {{ $article->getStatus($article->a_active)['class'] }}">{{ $article->getStatus($article->a_active)['name'] }}</a>
                              </td>
                              <td>
                                 {{ $article->created_at }}
                              </td>
                              <td class="text-center">
                                 <a href="{{ route('admin.get.edit.article', $article->id) }}" data-toggle="tooltip" title="Edit"
                                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                       <span class="btn-icon-wrapper opacity-8">
                                          <i class="fa fa-edit fa-w-20"></i>
                                       </span>
                                 </a>
                                 <form class="d-inline" action="" method="post">
                                       <a href="{{ route('admin.get.action.article', ['delete', $article->id]) }}"
                                          onclick="return confirm('Bạn có thực sự muốn xóa mục này?')">
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

                  {{-- <div class="d-block card-footer">
                     {{ $articles->links() }}
                  </div> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop