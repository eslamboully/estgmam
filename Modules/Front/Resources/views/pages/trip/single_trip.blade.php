@extends('front::layouts.master')

@section('content')
    <div class="Personal_Data">
        <div class="container">
            <div class="Display_Title">
                <p>@lang('front::front.trip_title')</p>
                <h1>{{ $trip->boat_title }}</h1>
            </div>

            <div class="location">
                <i class="icofont-location-pin"></i>
                <span>{{ $trip->user->state }}</span>
                <i class="icofont-location-pin"></i>
                <span>{{ $trip->user->country }}</span>
            </div>
            <div class="user_name">
                <a href="{{ route('personal_page',$trip->user->id) }}">
                    <span>{{ $trip->user->full_name }}</span>
                    <i class="fa fa-user"></i>
                </a>
            </div>
            <div class="Time_Listing">
                <span>{{ $trip->created_at->diffForHumans() }}</span>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    <!-- Header Start -->
    <header class="header-wrapper of-hidden">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="header-slider">
                        <div class="header-single-slider">
                            <figure>
                                <img src="{{ url('/') . '/' . $trip->left_side_boat_image }}" alt="good">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fowlo">
                @if(auth('web')->check())
                <form style="width: 100%;" method="POST" action="{{ in_array( auth()->user()->id ,  $trip->user->followers()->pluck('sender_id')->toArray() ) ? route('remove_follow' , $trip->user->id) : route('follow_user' , $trip->user->id) }}" style="display: inline-block">
                    <ul>
                        <li>
                            <!-- <a href="#"> -->
                            <a href="{{ url('https://wa.me/20').$trip->user->phone }}"><i class="fab fa-whatsapp"></i></a>
                            @lang('front::front.whatsapp')
                            <!-- </a> -->
                        </li>
                        <li>
                            <!-- <a href="#"> -->
                            <div class="btn-mobile">
                                <i class="fa fa-mobile-alt fa-1x"></i>
                                @lang('front::front.call')
                            </div>
                            <!-- </a> -->
                        </li>
                        @if(auth('web')->check())
                        <li>
                            <!-- <a href="#"> -->
{{--                            <i class="fa fa-rss fa-2x"></i>--}}
{{--                            @lang('front::front.follow')--}}
                            <!-- </a> -->
                                <form style="width: 100%;" method="POST" action="{{ in_array( auth()->user()->id ,  $trip->user->followers()->pluck('sender_id')->toArray() ) ? route('remove_follow' , $trip->user->id) : route('follow_user' , $trip->user->id) }}" style="display: inline-block">
                                    @csrf
                                    <button style="cursor: pointer" class="btn btn-default" type="submit">
                                        <i class="fa fa-rss"></i>

                                        {{ in_array( auth()->user()->id ,  $trip->user->followers()->pluck('sender_id')->toArray() ) ? trans('front::front.already_follow_this_user') : trans('front::front.follow_this_user') }}

                                    </button>


                        </li>

                        @endif
{{--                        <li>--}}
{{--                            <!-- <a href="#"> -->--}}
{{--                            <i class="fa fa-heart fa-2x"></i>--}}
{{--                            @lang('front::front.i_like_it')--}}
{{--                            <!-- </a> -->--}}
{{--                        </li>--}}
                    </ul>
                </form>
                @else
                    <h5 style="font-family: 'Cairo', sans-serif;" >@lang('front::front.sign_up_to_active')</h5>
                @endif
                <div style="clear: both"></div>
            </div>
            <div class="fowllo">
                <form class="" action="index.html" method="post">
                    <ul>
                        <li>
                            <!-- <a href="#"> -->
                            <i class="fa fa-rss fa-2x"></i>
                            @lang('front::front.comments')
                            <!-- </a> -->
                        </li>
                        <li>
                            @if(auth('web')->check())
                                <a href="#" style="font-family: 'Cairo', sans-serif;" class="do_chat" user_id="{{ $trip->user->id }}" user_image="{{ asset($trip->user->image) }}" name="{{ $trip->user->full_name }}">
                                    <i class="fab fa-facebook-messenger"></i>
                                    @lang('front::front.communication')
                                </a>
                            @else
                                <a href="{{ route('user.login') }}" style="font-family: 'Cairo', sans-serif;">
                                    <i class="fab fa-facebook-messenger"></i>
                                    @lang('front::front.communication')
                                </a>
                            @endif
                        </li>
                        <li>
                            <!-- <a href="#"> -->
                            <i class="fa fa-star fa-2x"></i>
                            @lang('front::front.rate')
                           <!-- </a> -->
                        </li>

                    </ul>
                </form>
                <div style="clear: both"></div>
            </div>

        </div>
    </header>
    <!-- Header End -->
    <div class="descriptioN">
        <div class="container">
           {!! $trip->desc !!}
        </div>
    </div>


    <!-- Start Comments -->

    <div class="Add_Comments font-good">
        <div class="container">
            <form class="" action="{{ route('add_comment') }}" method="post">
                @csrf
                <input hidden name="trip_id" value="{{ $trip->id }}">
                <textarea name="comment" placeholder="اكتب تعليقك هنا"></textarea>
                <button class="" type="submit">@lang('comment::comment.send')</button>
                <div style="clear: both;"></div>
            </form>
        </div>
    </div>

    @foreach($trip->comments as $comment)
        <div class="COMENT font-good">
        <div class="container">
            <div class="hr">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="span">{{ $comment->user->full_name }}</span>
                </a>
                <div class="Time">
                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <div style="clear: both;"></div>
                <div class="Content">
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
@push('js')
    <script>
        $('.btn-mobile').on('click',function () {
            $(this).replaceWith('<div><i class="fa fa-mobile-alt fa-1x"></i> {{ $trip->user->phone }}</div>');
        });
    </script>
@endpush