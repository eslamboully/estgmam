@extends('front::layouts.master')

@section('content')
    <div class="AD_Your_ad">
        <a href="{{ route('create_front_trip') }}">
            <button type="button" name="button">
                <i class="fa fa-plus"></i>
                @lang('front::front.add_ads')
            </button>
        </a>
    </div>
     <section class="casestudies pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 text-center">
                    <div class="st">
                        <h2 class="font-good">@lang('front::front.estgmam_title')</h2>
                        <hr class="sseprator">
                        <p style="font-family: 'Cairo', sans-serif;">@lang('front::front.estgmam_message')</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($sub_cats as $cat)
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                        <div class="studiesbox">
                            <img style="width: 350px;height: 350px;" src="{{ $cat->image }}" alt="">
                            <div class="media">
                                <i class="fa fa-hand-point-up"></i>
                                <div class="media-body">
                                    <h4 class="mt-0 font-good">{{ $cat->title }}</h4>
                                    {!! $cat->desc !!}
                                    <a class="font-good" href="{{ route('single_cat_khot',$cat->id) }}">@lang('front::front.more_message')<i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Case Studies End -->

    <!-- Our Gallery Start -->
    <section class="our-gallery pb-120 of-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 text-center">
                    <div class="st">
                        <h2 class="font-good">@lang('front::front.photo_trips')</h2>
                        <hr class="sseprator">
                        <p style="font-family: 'Cairo', sans-serif;">@lang('front::front.message_trips')</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="gallery-items">
                    @foreach($photos as $photo)
                    <div class="gallery-item">
                        <a href="{{ url('/'). '/' .$photo->image }}" class="popup">
                            <img style="width:337.75px;height: 324.27px" src="{{ url('/'). '/' .$photo->image }}" alt="" />
                            <span class="gallery-text font-good">{{ $photo->title }}</span>
                            <div class="goverlay"></div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="button_anmatione">
        <ul>
            <a class="font-good" href="{{ route('all_gallery') }}">
                <i class="fa fa-images"></i>
                @lang('front::front.photo_album_message')
            </a>
        </ul>
        <ul>
            <a class="font-good" href="{{ route('all_video') }}">
                <i class="fab fa-youtube"></i>
                @lang('front::front.video_album_message')
            </a>
        </ul>
        <div style="clear: both;"></div>
    </div>

    <!-- Our Gallery End -->

    <!-- Testimonial Start -->
    <section class="testimonial-wrapper of-hidden pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 text-center">
                    <div class="st">
                        <h2 class="font-good">@lang('front::front.mesaha_e3lania')</h2>
                        <hr class="sseprator">
                        <p style="font-family: 'Cairo', sans-serif;">@lang('front::front.message_mesaha')</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-carousel">
                        @foreach($ads as $ad)
                            <div class="single-testimonial">
                            <a href="{{ route('final_show_ad',$ad) }}">
                                <div class="testimonial-image">
                                    <img width="262px" height="262px" src="{{ asset('upload/posts/'.$ad->photo1) }}" alt="">
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="testimonial-title">
                                            <h4 class="font-good">@lang('front::front.mesaha_e3lania')</h4>
                                            <h5 class="font-good">@lang('front::front.mesaha_e3lania')</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="testimonial font-good">
                                            {!! str_limit($ad->desc,90) !!}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <div class="Add_your_ad">
        <a class="font-good" href="{{route('add_ads')}}">
            <button>
                <i class="fa fa-ad"></i>
                @lang('front::front.add_your_ad')
            </button>
        </a>
    </div>

    <!-- Partners Start -->
    <section class="partners-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partner-carousel">
                        @foreach($ads as $ad)
                            <a href="{{ route('final_show_ad',$ad->id) }}">
                                <div class="single-partner">
                                    <div class="inner-partner">
                                        <img width="198px" height="120px" src="{{ asset('upload/posts/'.$ad->photo1) }}" alt="">
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners End -->
    <section class="footer-wrapper">
        <div class="container cont_border">
            <ul>
                <li><a href="{{ route('commission') }}">@lang('config::config.commission')</a></li>
                <li><a href="{{ route('install_advertising') }}">@lang('config::config.install_advertising')</a></li>
                <li><a href="{{ route('laws') }}">@lang('config::config.laws')</a></li>
                <li><a href="{{ route('why_banned') }}">@lang('config::config.why_banned')</a></li>
                <li><a href="{{ route('what_i_do') }}">@lang('config::config.what_i_do')</a></li>
                <li><a href="{{ route('contact') }}">@lang('config::config.contact_us')</a></li>
                @if(auth()->check())
                    <li><a href="{{ route('user_logout') }}">@lang('front::front.logout')</a></li>
                @endif
            </ul>
        </div>
    </section>
@stop
