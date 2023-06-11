<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/core-img/favicon.ico') }}">
        <title>Admin - Essence Shop @yield('title')</title>
        <meta name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description"
            content="This is an example dashboard (CodeLean) created using build-in elements and components.">

        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link href="{{ asset('admin_style/main.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_style/my_style.css') }}" rel="stylesheet">
        <style>
            .error-text {
                color: red;
                font-style: italic;
                font-size: 13px;
            }
            .required {
                color: red;
                font: bolder;
                font-size: 15px;
            }
            #error {
                width: 340px; 
                background-color: rgb(250, 103, 103);
			    color: white;
            }
            #success {
                width: 250px; 
                background-color: #31AF8C;
                color: white;
            }
            .alert {
                z-index: 3;
            }
            .success, .error{
                font-size: small;
            }
            .internet {
                font-size: 15px;
                position: fixed;
                bottom: 20px;
                right: 50px;
                font-family: system-ui !important;
                display: block;
                border-radius: 10px;
                animation: showAlert 0.5s ease-in-out 1;
                display: none;
            }
            .internet .close {
                top: 12px !important;
            }
            @keyframes showAlert{
                from{
                    opacity: 0;
                    transform: translate(0, 100px);
                } to {
                    opacity: 1;
                    transform: translate(0, 0);
                }
            }
        </style>
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                <a href="{{ route('admin.home') }}"><img src="{{ asset('images/core-img/logo.png') }}" alt=""></a>
                <div class="header__pane ml-auto">
                    <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                            </button>
                    </div>
                </div>
                </div>
                <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
                </div>
                <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                    </button>
                </span>
                </div>
                <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                            <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                            </div>
                            <button class="close"></button>
                    </div>
                </div>
                <div class="app-header-right">
                    {{-- <div class="header-dots">
                            <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                        <span class="icon-wrapper-bg bg-primary"></span>
                                        <i class="icon text-primary ion-android-apps"></i>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-plum-plate">
                                        <div class="menu-header-image"
                                            style="background-image: url('assets/images/dropdown-header/abstract4.jpg');">
                                        </div>
                                        <div class="menu-header-content text-white">
                                            <h5 class="menu-header-title">Grid Dashboard</h5>
                                            <h6 class="menu-header-subtitle">Easy grid navigation inside dropdowns</h6>
                                        </div>
                                        </div>
                                </div>
                                <div class="grid-menu grid-menu-xl grid-menu-3col">
                                        <div class="no-gutters row">
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>
                                                    Automation
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-piggy icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Reports
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-config icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Settings
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-browser icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Content
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-hourglass icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>
                                                    Activity
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Contacts
                                            </button>
                                        </div>
                                        </div>
                                </div>
                                <ul class="nav flex-column">
                                        <li class="nav-item-divider nav-item"></li>
                                        <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shadow btn btn-primary btn-sm">Follow-ups</button>
                                        </li>
                                </ul>
                            </div>
                            </div>
                    </div> --}}
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                        <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{ asset('admin_style/assets/images/_default-user.png') }}"
                                                    alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                    <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2"
                                                        style="background-image: url('assets/images/dropdown-header/city3.jpg');">
                                                    </div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle"
                                                                            src="{{ asset('admin_style/assets/images/_default-user.png') }}" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{ get_data_user('admins', 'name') }}</div>
                                                                    <div class="widget-subheading opacity-8">A short
                                                                            profile description</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <button class="btn-pill btn-shadow btn-shine btn btn-focus"><a href="{{ route('admin.logout') }}">Đăng xuất</a></button>
                                                                </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                    <li class="nav-item-btn text-center nav-item">
                                                    <a href="https://dashboard.tawk.to/#/inbox/6370ab16b0d6371309cebf9e/all" target="_blank">
                                                        <button class="btn-wide btn btn-primary btn-sm"> Open Messages
                                                        </button>
                                                    </a>
                                                    </li>
                                            </ul>
                                        </div>
                                        </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                        <div class="widget-heading"> {{ get_data_user('admins', 'name') }} </div>
                                        <div class="widget-subheading"> Admin </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>
                                <li class="mm-active">
                                    <a href="{{ route('admin.home') }}" class="{{ \Request::route()->getName() == 'admin.home' ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-home"></i>Trang chủ
                                    </a>
                                </li>
                                <li class="mm-active">
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-server"></i>Dữ liệu
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                                <a href="{{ route('admin.get.list.category') }}" class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Danh mục
                                                </a>
                                        </li>
                                        <li>
                                                <a href="{{ route('admin.get.list.product') }}" class="{{ \Request::route()->getName() == 'admin.get.list.product' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Sản phẩm
                                                </a>
                                        </li>
                                        <li>
                                                <a href="{{ route('admin.get.list.article') }}" class="{{ \Request::route()->getName() == 'admin.get.list.article' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Tin tức & Sự kiện
                                                </a>
                                        </li>
                                        <li>
                                                <a href="{{ route('admin.get.list.page_static') }}" class="{{ \Request::route()->getName() == 'admin.get.list.page_static' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Trang tĩnh
                                                </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.get.list.warehouse') }}" class="{{ \Request::route()->getName() == 'admin.get.list.warehouse' ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon"></i>Kho hàng
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mm-active">
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-plugin"></i>Thông tin / Chức năng
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                                <a href="{{ route('admin.get.list.transaction') }}" class="{{ \Request::route()->getName() == 'admin.get.list.transaction' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Đơn hàng
                                                </a>
                                        </li>
                                        <li>
                                                <a href="{{ route('admin.get.list.contact') }}" class="{{ \Request::route()->getName() == 'admin.get.list.contact' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Liên hệ
                                                </a>
                                        </li>
                                        <li>
                                                <a href="{{ route('admin.get.list.rating') }}" class="{{ \Request::route()->getName() == 'admin.get.list.rating' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Đánh giá
                                                </a>
                                        </li>
                                        <li>
                                                <a href="{{ route('admin.get.list.user') }}" class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>User 
                                                </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="alert alert-danger alert-dismissible internet" id="error">
                    <strong><i class="fa fa-exclamation-triangle"></i> Internet disconnect!</strong> <br>
                    <span class="error">&emsp;&nbsp;&nbsp;Trang web có thể chứa một số lỗi. </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible internet" id="success">
                    <i class="fa fa-wifi"></i><strong> Internet connected!</strong><br>
                    <span class="success">&emsp;&nbsp;&nbsp;Đã kết nối thành công!!</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="margin-top: 20px">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" style="position: fixed; right: 20px">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 8px">&times;</a>
                       <strong>Thành công!</strong> {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible" style="position: fixed; right: 20px">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 2px">&times;</a>
                       <strong>Lỗi!</strong> {{ Session::get('danger') }}
                    </div>
                    @endif
                    @yield('content')
                 </main>
            </div>
        </div>
        
        <script>
			window.addEventListener('offline', function(){
				document.getElementById('success').style.display = 'none';
				document.getElementById('error').style.display = 'block';
			});
			window.addEventListener('online', function(){
				document.getElementById('error').style.display = 'none';
				document.getElementById('success').style.display = 'block';
			});
		</script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}

        <script src="{{ asset('admin_style/assets/scripts/jquery-3.2.1.min.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ asset('admin_style/assets/scripts/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin_style/assets/scripts/my_script.js') }}"></script>
        @yield('script')
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) 
                {
                var reader = new FileReader();
                reader.onload = function (e) {
                        $('#out_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }
            $('#input_img').change(function(){
                readURL(this);
            });
        </script>
        
    </body>
</html>