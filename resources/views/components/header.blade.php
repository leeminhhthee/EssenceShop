<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="{{ route('home') }}"><img style="" src="{{ asset('images/core-img/logo.png') }}" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="expand"><a href="{{ route('get.product.all') }}">Sản phẩm</a>
                                <div class="restrain mega-menu megamenu" style="width: 250%">
                                    <span style="width: 100%">
                                        @if (isset($categories))
                                            @foreach ($categories as $category) 
                                                <a class="mega-menu-title" href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}">{{ $category->c_name }}</a>
                                            @endforeach
                                         @endif
                                    </span>
                                    {{-- <span class="block-last"> --}}
                                </div>
                            </li>
                            <li class="expand"><a href="{{ route('get.list.article') }}" title="Article">Tin tức & sự kiện</a></li>
                            {{-- <li class="expand"><a href="">About</a></li> --}}
                            <li class="expand"><a href="{{ route('get.contact') }}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <div class="row">
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">Menu</span>
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                                    <li><a href="{{ route('get.product.all') }}">Sản phẩm<</a>
                                        <ul>
                                            @if (isset($categories))
                                                @foreach ($categories as $category)
                                                <li><a href="{{ route('get.list.product', [$category->c_slug, $category->id]) }}">{{ $category->c_name }}</a>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('get.list.article') }}">Tin tức & sự kiện</a></li>
                                    <li><a href="./contact">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>						
                    </div>
                </div>
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- language division start -->
                    <div class="disflow">
                        <div class="expand lang-all disflow">
                            <a href="#"><img src="{{ asset('img/country/vietnam.png') }}" alt="">Viet Nam</a>
                            <ul class="restrain language">
                                <li><a href="#"><img src="{{ asset('img/country/en.gif') }}" alt="">English</a></li>
                                <li><a href="#"><img src="{{ asset('img/country/russia.png') }}" alt="">Russia</a></li>
                                <li><a href="#"><img src="{{ asset('img/country/en.gif') }}" alt="">English</a></li>
                            </ul>
                        </div>
                        {{-- <div class="expand lang-all disflow" >
                            <a href="#">₫ VND</a>
                            <ul class="restrain language">
                                <li><a href="#">€ Eur</a></li>
                                <li><a href="#">$ USD</a></li>
                                <li><a href="#">₽ Ruble</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{ route('get.list.shopping.cart') }}"><i class="icon-bag"></i></a>
                                    <a href="{{ route('get.list.shopping.cart') }}"><span class="cart-quantity">{{ Cart::count()}}</span></a>
                                </div>

                                <div class="restrain small-cart-content">
                                    <ul class="cart-list">
                                        <?php  
                                        $products = Cart::content();    
                                        ?>
                                        @foreach ($products as $key =>$product) 
                                        <li>
                                            <a class="sm-cart-product" href="">
                                                <img src="{{ asset(pare_url_file($product->options->avatar)) }}" alt="">
                                            </a>
                                            <div class="small-cart-detail">
                                                <a class="remove" href="{{ route('delete.shopping.cart', $key) }}"><i class="fa fa-times-circle"></i></a>
                                                <a class="small-cart-name" href="{{ route('get.detail.product', [$product->options->slug, $product->id]) }}" 
                                                    style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 150px; font-size: 12px">{{ $product->name }}</a>
                                                <span class="quantitys"><strong>{{ $product->qty }}</strong>x<span style="font-size: 11px">{{ number_format($product->qty * $product->price,'0','','.',).' VND' }}</span></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <p class="total">Tổng tiền: <span class="amount">{{ Cart::subtotal(0, 3) }} VND</span></p>
                                    <p class="buttons">
                                        <?php
                                        $total = Cart::subtotal(0, 3);   
                                        ?>
                                        @if ( $total > 0)
                                        <a href="{{ route('get.form.pay') }}" class="button">Thanh toán</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="{{ route('get.product.list') }}" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" maxlength="128" name="k" placeholder="Tìm kiếm sản phẩm...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                    </div>
                    <!-- info -->
                    <div class="disflow">
                        @if (Auth::check())
                        <div style="border-left: 2px solid black">
                            <a href="{{ route('user.dashboard') }}">&nbsp; {{ get_data_user('web', 'name') }}</a>
                        </div>
                        @endif
                    </div>
                    <!-- end info -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language" style="width: 180px">
                                @if (Auth::check())
                                <li><a href="{{ route('user.dashboard') }}" title="Personal Infor">Tài khoản của tôi</a></li>
                                <li><a href="#">Sản phẩm yêu thích</a></li>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="{{ route('get.logout.user') }}">Đăng xuất</a></li>     
                                @else
                                <li><a href="{{ route('get.login') }}">Đăng nhập</a></li>      
                                <li><a href="{{ route('get.register') }}">Đăng ký</a></li>                   
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>
