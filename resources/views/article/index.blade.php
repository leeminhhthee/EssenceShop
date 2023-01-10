@extends('layouts.app')
@section('title', '| Tin tức & Sự kiện')
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
                        <li class="category3"><span>Tin tức & Sự kiện</span></li>
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
            <h2>Bài viết</h2>
        </div>
        <!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
                        @include('components.article')
                    </div>
                    <div class="col-sm-3">
                        <h6 style="color: rgb(197, 1, 1)"><i class="fa fa-fire fa-2x"></i> Một số sự kiện, tin tức nổi bật</h6>
                        <div class="list_article_hot">
                        @include('components.article_hot')
                        </div>
                    </div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->
    </div>
</div>
@stop