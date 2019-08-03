@extends('front::layouts.master')
@section('content')

    @if(!request()->has('ad_type'))
        <div class="AdvertisingPage">
        <div class="container">

            <div class="title">
                <h1 class="font-good">@lang('front::front.to_add_estgmam')</h1>
                <p>
                    @lang('front::front.ad_time_on')
                </p>
            </div>
            <div class="Requirements">
                @foreach($plans as $plan)
                    <div class="Sone">
                        <a class="font-good" href="{{ url('add/ads?ad_type='.$plan->id) }}">
                            <button>@lang('front::front.choose')</button>
                        </a>
                        <p>@lang('front::front.ad_month') {{ $plan->date }} {{ $plan->money }} {{ $plan->currency }}</p>
                        <div style="clear: both;"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
        <form action="{{ route('update_ads_post',$post->id) }}" method="post">
            @csrf
            @method('put')
        <input hidden class="hidden" value="{{ auth()->user()->id }}">
        <div class="container Flags">
            <h3 class="font-good">@lang('front::front.message_ad')</h3>
        </div>

        <div class="Decoration">
            <div class="container">
                <p style="text-align:right;">
                    @lang('front::front.message_ad_message')
                </p>
            </div>
        </div>

        <div class="container Foorm">
            <div>
                <textarea class="form-control" style="height: 130px" name="desc" placeholder=" ....@lang('front::front.ad_desc')">{{ $post->desc }}</textarea>
                    <input hidden class="hidden" name="plan_id" value="{{ request()->ad_type }}">

                <button class="btn btn-primary form-control">@lang('front::front.go_ad')</button>
            </div>
        </div>


        </form>
    @endif
@endsection

@push('js')
    <script>
        $('.upload1').on('click',function () {

            $('.photo1').click();
            $('.upload1 i').removeClass('fa-plus').addClass('fa-upload');
            return false;
        });

        $('.upload2').on('click',function () {

            $('.photo2').click();
            $('.upload2 i').removeClass('fa-plus').addClass('fa-upload');
            return false;
        });

        $('.upload3').on('click',function () {

            $('.photo3').click();
            $('.upload3 i').removeClass('fa-plus').addClass('fa-upload');
            return false;
        });

        $('.upload4').on('click',function () {

            $('.photo4').click();
            $('.upload4 i').removeClass('fa-plus').addClass('fa-upload');
            return false;
        });

        $('.upload5').on('click',function () {

            $('.photo5').click();
            $('.upload5 i').removeClass('fa-plus').addClass('fa-upload');
            return false;
        });

        $('.upload6').on('click',function () {

            $('.photo6').click();
            $('.upload6 i').removeClass('fa-plus').addClass('fa-upload');
            return false;
        });
    </script>
@endpush