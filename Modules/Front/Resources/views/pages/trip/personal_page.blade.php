@extends('front::layouts.master')

@section('content')

<div class="personal_page">
    <div class="container">
        <div class="sectioneRight">
            <div class="Page_Activity">
                <span>{{ $user->created_at->diffForHumans() }}</span>
            </div>
            @if(Auth::id() != $user->id)

            <div class="Sone1">
                <a href="#" class="do_chat" user_id="{{ $user->id }}" user_image="{{ asset($user->image) }}" name="{{ $user->full_name }}">
                    <i class="fab fa-facebook-messenger"></i>
                    @lang('front::front.contact')
                </a>
            </div>
            <div class="Sone2">
                <a href="#">
                    <i class="fa fa-star"></i>
                    @lang('front::front.add_rate')
                </a>
            </div>


                <div class="Sone">
                    @if(auth('web')->check())
                    <form style="width: 100%;" method="POST" action="{{ in_array( auth()->user()->id ,  $user->followers()->pluck('sender_id')->toArray() ) ? route('remove_follow' , $user->id) : route('follow_user' , $user->id) }}" style="display: inline-block">
                        @csrf
                        <button style="cursor: pointer" type="submit">
                            <i class="fa fa-rss"></i>

                            {{ in_array( auth()->user()->id ,  $user->followers()->pluck('sender_id')->toArray() ) ? trans('front::front.already_follow_this_user') : trans('front::front.follow_this_user') }}

                        </button>
                    </form>
                    @endif


                </div>

            @endif
            <div class="Sone3">
                <span>{{ $user->followers()->count() }}</span>
                @lang('front::front.followers')
                <i class="fa fa-user"></i>
            </div>
            <div class="Sone4">
                <h4 class="font-good">{{ $user->full_name }}</h4>
                <span>
              <i class="icofont-location-pin"></i>
              {{ $user->state }}
            </span>
                <span>
              <i class="icofont-location-pin"></i>
              {{ $user->country }}
            </span>
            </div>

        </div>
        <div class="sectioneLeft">
            <div class="cement-section">
                <div class="container">
                    <div class="row">
                        @foreach($user->trips as $trip)
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <a href="{{ route('single_trip',str_replace(' ','-',$trip->boat_title)) }}">
                                    <div class="HR font-good">
                                        <div class="img">
                                            <img src="{{ url('/'). '/' . $trip->left_side_boat_image }}" alt="" title="" />
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 title">
                                            <p>{{ $trip->categories->first()->title }}</p>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 time T-M">
                                    <span>
                                        {{ $trip->created_at->diffForHumans() }}
                                    </span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 inbout">
                                            <div class="A-N">
                                    <span>
                                        {{ __('front::front.vehicle_name') }}
                                    </span>
                                                <span>
                                        {{ $trip->boat_title }}
                                    </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-xs-12 inbout">
                                            <div class="A-N">
                                    <span>
                                        @lang('front::front.marsa')
                                    </span>
                                                <span>
                                        {{ $trip->berth }}
                                    </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-xs-12 inbout">
                                            <div class="A-N">
                                    <span>
                                        @lang('front::front.one_price')
                                    </span>
                                                <span>
                                        {{ $trip->passenger_price }}
                                    </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-sm-12 col-xs-12 inbout">
                                            <div class="A-N">
                                    <span>
                                        @lang('front::front.trip_price')
                                    </span>
                                                <span>
                                        {{ $trip->price }}
                                    </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 The-state ">
                                <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-map-marker one"></i>
                                    {{ $trip->status == 'active' ? __('trip::trip.active') : __('trip::trip.pending')  }}
                                </span>
                                            {{--                                <span class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                                            {{--      							<i class="fa fa-map-marker two"></i>--}}
                                            {{--    							جدة--}}
                                            {{--      						</span>--}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Area Start -->
{{--    <section class="footer-wrapper">--}}
{{--        <div class="container cont_border">--}}
{{--            <ul>--}}
{{--                <li><a href="#"> عمولة الموقع</a></li>--}}
{{--                <li><a href="#">تثبيت الأعلان</a></li>--}}
{{--                <li><a href="#">قوانين الموقع</a></li>--}}
{{--                <li><a href="#">ماهي اسباب حظر العضوية ؟</a></li>--}}
{{--                <li><a href="#">ماذا افعل ان تم حظري ؟</a></li>--}}
{{--                <li><a href="#">التواصل مع مسؤلي الموقع</a></li>--}}
{{--                <li><a href="#">عن موقع تراك لوكيشن</a></li>--}}
{{--                <li><a href="#">ضع رأيك بالموقع وتوصيتك في تحسينة من هنا</a></li>--}}
{{--                <li><a href="#">تسجيل الخروج</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Footer Area End -->

    <!-- Scripts Start -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/jquery.hoverdir.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>

    <!-- Particle for Overview Section -->
    <!-- <script src="assets/js/particles.js"></script> -->

    <!-- Contact Form -->
    <script src="assets/js/contactform.js"></script>

    <!-- Coming Soon Page -->
    <script src="assets/js/timecircles.js"></script>
    <script src="assets/js/jquery.downcount.js"></script>

    <!-- Map Script -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqoWGSQYygV-G1P5tVrj-dM2rVHR5wOGY"></script>
    <script src="assets/js/map-script.js"></script> -->

    <!-- Custom -->
    <script src="assets/js/custom.js"></script></div>

@endsection