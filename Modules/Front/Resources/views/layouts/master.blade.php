<!DOCTYPE html>
<html lang="{{ App()->getLocale() == 'ar' ? 'ar' : 'en' }}" >

{{--dir="{{ App()->getLocale() == 'ar' ? 'ltr' : 'rtl' }}"--}}
<!-- Mirrored from nayrathemes.com/demo/html/metrico/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2019 22:04:55 GMT -->
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="AminulHchy">

    <!-- Title -->
    <title>{{ app_name() }} | {{ $title }}</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets2/img/shipp.png" type="image/x-icon" />

    <!-- Included CSS -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/iconfont/icofont.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/all.css">
    <!-- Coming Soon CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/timecircles.css">
    <!-- Typography Css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/typography/typography.css">
    <!-- Color CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/color/default.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/main.css">
    <!-- Widget CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/widgets.css">
    <!-- Reponsive CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets2/css/responsive.css">
    <link rel="stylesheet" href="{{admin_design('plugins/noty/noty.css')}}">
    @stack('css')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body>

<!-- Preloader Start -->
<div class="preloader-wrapper">
    <div class="preloader loading">
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
    </div>
</div>
<!-- Preloader End -->

<!-- Top Bar Start -->
<section class="top-bar d-none d-lg-block font-good">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xl-3 offset-xl-3">
                <div class="info-area">
                    <div class="info-icon"><i class="icofont-location-pin"></i></div>
                    <div class="info-text">
                        <h6 class="font-good">@lang('front::front.our_location')</h6>
                        <p>{{ $config->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-3">
                <div class="info-area">
                    <div class="info-icon"><i class="icofont-phone"></i></div>
                    <div class="info-text">
                        <h6 class="font-good">@lang('config::config.email')</h6>
                        <p>{{ $config->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-3">
                <div class="info-area">
                    <div class="info-icon">
                        <i class="icofont-clock-time"></i>
                    </div>
                    <div class="info-text">
                        <h6 class="font-good">@lang('front::front.works_hour')</h6>
                        <p>@lang('front::front.works_hour_message')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Bar End -->

<!-- Navigation Start -->
<nav class="navigation sticky-nav">
    <div class="container">
        <div class="row">
            <div class="col-7 col-lg-3">
                <div class="logo">
                    <div class="logo-text">
                        <a href="{{ url('/') }}">
                            <h2 class="font-good">{{ $config->title }}</h2>
                        </a>
                        <div class="logo-title">
                            {!! $config->desc !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block nav-menu">
                <ul id="menu" class="menu">
                    @if($parent_cats->count() > 0)
                        @foreach($parent_cats as $cat)
                            <li class="menu-item-has-children"><a class="font-good" href="#">{{ $cat->title }}</a>
                                <ul class="sub-menu">
                                    @foreach($cat->child as $sub_cat)
                                    <li><a class="font-good" href="{{ route('single_cat_khot',$sub_cat->id) }}">{{ $sub_cat->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    @endif
                    <li><a class="font-good" href="{{ url('/') }}">@lang('front::front.home')</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-5 text-right text-lg-left">
                <ul class="nav-right">

                    @if(auth('web')->check())


                    <li class="cart-wrapper">

                            @if(auth()->check())
                                <div class="cart-icon-wrap">
                                    <a href="#" id="cart"><i class="fa fa-bell"></i></a>
                                    <span>{{ auth('web')->user()->unreadNotifications->count() }}</span>
                                </div>
                                <div class="shopping-cart">

                                    <ul class="shopping-cart-items">

                                        @foreach( auth('web')->user()->notifications as $notification )

                                            <li>
                                                <a href="{{ $notification->data['route'] }}">
                                                    <span class="item-name">{{ $notification->data['title'] }}</span>
                                                    <span class="item-price">{{ $notification->created_at->diffForhumans() }}</span>
                                                    <span class="item-quantity"></span>
                                                </a>
                                            </li>

                                        @endforeach

                                    </ul>

                                    <a href="#" class="boxed-btn font-good" data-text="عرض الكل"><span>عرض الكل</span><i class="icofont-bubble-right"></i></a>
                                </div>
                            @endif
                    </li>

                    @php

                        $user = auth()->user();

                    @endphp

                    <li class="cart-wrapper">

                        <div class="cart-icon-wrap">
                            <a href="#" id="cart"><i class="fa fa-envelope"></i></a>
                        </div>
                        <!-- Shopping Cart -->
                        <div class="shopping-cart">

                            <!--end shopping-cart-header -->

                            <ul class="shopping-cart-items">

                              @foreach( $user->friends() as $friend )

                                @if($friend->sender->id == $user->id)

                                    @php
                                        $friend = $friend->reciever;
                                    @endphp
                                @else

                                    @php
                                        $friend = $friend->sender;
                                    @endphp

                                @endif

                              <li style="color: #000" class="do_chat" user_image="{{ asset($friend->image) }}" class="" user_id='{{ $friend->id }}' name='{{ $friend->full_name }}'>



                                    <h5 class="name">

                                        <div style="display: inline-block" class="pull-left">
                                            <img width="60" height="60" src="{{ asset($friend->image) }}" class="img-thumbnail">
                                            {{ $friend->full_name }}
                                        </div>

                                        <div style="display: inline-block;margin-left:40px" class="last-message pull-right"> {{ ($friend->last_message_info()) ? $friend->last_message_info()->content : '' }}
                                        </div>
                                    </h5>

                              </li>

                              @endforeach
                        </ul>
                        </div>
                    </li>

                    @endif

                    @if(!auth()->check())
                        <li class="number-info d-none d-lg-inline-block"><a class="font-good" href="{{ route('user.login') }}">@lang('front::front.login')</a></li>
                    @else
                        @php
                            $full_name = explode(' ',auth()->user()->full_name);

                        @endphp
                        <li class="number-info d-none d-lg-inline-block"><a class="font-good" href="{{ route('profile') }}">{{ $full_name[0] }} <img style="width: 30px;height: 30px;" src="{{ asset('/') . auth()->user()->image }}"></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>


    <!-- Start Mobile Menu -->
    <div class="mobile-menu-area d-lg-none">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav class="mobile-menu-active">
                        @if(App()->getLocale() == 'ar')
                            <ul class="menu">
                                <li><a class="font-good" href="{{ url('/') }}">@lang('front::front.home')</a></li>
                                @if($parent_cats->count() > 0)
                                    @foreach($parent_cats as $cat)
                                        <li class="menu-item-has-children"><a class="font-good" href="#">{{ $cat->title }}</a>
                                            <ul class="sub-menu">
                                                @foreach($cat->child as $sub_cat)
                                                    <li><a class="font-good" href="{{ route('single_cat_khot',$sub_cat->id) }}">{{ $sub_cat->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
{{--                                <li><a class="font-good" href="{{ url('/') }}">@lang('front::front.more_cats')</a></li>--}}
                            </ul>
                        @else
                            <ul class="menu">
                                    <li><a class="font-good" href="{{ url('/') }}">@lang('front::front.home')</a></li>
                            </ul>
                        @endif
                    </nav>
                    @if(!auth()->check())
                        <div class="signIn">
                            <a href="{{ route('user.login') }}">@lang('front::front.login')
                                <i class="fa fa-sign-in-alt"></i>
                            </a>
                        </div>
                    @else
                        <div class="signIn">
                            <a href="{{ route('profile') }}">{{ auth()->user()->full_name }}

                            </a>
                        </div>
                    @endif
                    <div class="Admin">
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-user"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu -->
</nav>
<!-- Navigation End -->
<div class="scrollmenu">
{{--    <a href="#base">--}}
{{--        <i class="fa fa-sitemap"></i>--}}
{{--        ... اقسام اكثر</a>--}}
    <a href="{{ route('all_cats') }}"><i class="fa fa-sitemap"></i> @lang('front::front.more_cats')</a>
    @foreach($sub_cats as $cat)
        <a href="{{ route('single_cat_khot',$cat->id) }}">{{ $cat->title }}</a>
    @endforeach
    <a href="{{ url('/') }}">@lang('front::front.home')</a>
</div>

<!-- Info Section -->
<div class="scrollmenu" id="navbar">
    <a href="{{ route('all_cats') }}"><i class="fa fa-sitemap"></i> @lang('front::front.more_cats')</a>
    @foreach($sub_cats as $cat)
        <a href="{{ route('single_cat_khot',$cat->id) }}">{{ $cat->title }}</a>
    @endforeach
    <a href="{{ url('/') }}">@lang('front::front.home')</a>
</div>
<script type="text/javascript">
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "50px";
        } else {
            document.getElementById("navbar").style.top = "-60px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>
<div class="Notifications">
    <div class="container">
        <ul>
            <li><i class="fa fa-heart"></i> المفضلة</li>
            <li><i class="fa fa-bell"></i> الإشعارات</li>
            <li><i class="fa fa-envelope"></i> رسائال</li>
        </ul>
    </div>
    <div style="clear: both;"></div>
</div>



<!-- Header End -->

@yield('content')
<!-- Footer Area Start -->
<!-- Footer Area End -->

<!-- Scripts Start -->
<script src="{{ url('/') }}/assets2/js/jquery.min.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.easing.js"></script>
<script src="{{ url('/') }}/assets2/js/popper.min.js"></script>
<script src="{{ url('/') }}/assets2/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/assets2/js/owl.carousel.min.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.sticky.js"></script>
<script src="{{ url('/') }}/assets2/js/wow.min.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.counterup.min.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.magnific-popup.min.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.meanmenu.min.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.hoverdir.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.shuffle.min.js"></script>

<!-- Particle for Overview Section -->
<script src="{{ url('/') }}/assets2/js/particles.js"></script>

<!-- Contact Form -->
<script src="{{ url('/') }}/assets2/js/contactform.js"></script>

<!-- Coming Soon Page -->
<script src="{{ url('/') }}/assets2/js/timecircles.js"></script>
<script src="{{ url('/') }}/assets2/js/jquery.downcount.js"></script>

<!-- Custom -->
<script src="{{ url('/') }}/assets2/js/custom.js"></script>

@include('realtime::configurations')

@stack('js')


<script src="{{admin_design('plugins/noty/noty.min.js')}}"></script>
@include('adminpanel::includes.messages')

</body>


</html>
