@extends('front::layouts.master')

@section('content')
    <div class="Main_section">
        <div class="container">
            <div class="Off_section">
                <div class="section_Son color_E">
                    <a href="{{ route('my_language') }}">
                        <i class="fa fa-cogs"></i>
                        <p class="font-good">@lang('front::front.settings')</p>
                    </a>
                </div>
                <div class="section_Son color_A">
                    <a href="{{ route('create_front_trip') }}">
                        <i class="fa fa-plus-circle"></i>
                        <p class="font-good">@lang('front::front.add_trip')</p>
                    </a>
                </div>
                <div class="section_Son color_B">
                    <a href="{{ route('my_info') }}">
                        <i class="fa fa-swatchbook"></i>
                        <p class="font-good">@lang('front::front.my_info')</p>
                    </a>
                </div>
                <div class="section_Son color_3">
                    <a href="{{ route('my_offers_trip') }}">
                        <i class="fa fa-store"></i>
                        <p class="font-good">@lang('front::front.my_offers')</p>
                    </a>
                </div>
                <div class="section_Son color_Y">
                    <a href="{{ route('view_video') }}">
                        <i class="fa fa-video"></i>
                        <p class="font-good">@lang('front::front.add_video')</p>
                    </a>
                </div>
                <div class="section_Son color_P">
                    <a href="{{ route('gallery') }}">
                        <i class="fa fa-images"></i>
                        <p class="font-good">@lang('front::front.add_photo')</p>
                    </a>
                </div>
{{--                <div class="section_Son color_S">--}}
{{--                    <a href="#">--}}
{{--                        <i class="fa fa-star"></i>--}}
{{--                        <p class="font-good">@lang('front::front.user_rate')</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="section_Son color_S">
                    <a href="{{ route('show_ads') }}">
                        <i class="fa fa-ad"></i>
                        <p class="font-good">@lang('front::front.my_ads')</p>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush

@push('css')

@endpush