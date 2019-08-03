@extends('front::layouts.master')

@section('content')

    <section class="casestudies pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 text-center">
                <div class="st">
                    <h2 class="font-good">@lang('front::front.estgmam_title_all')</h2>
                    <hr class="sseprator">
                    <p>@lang('front::front.estgmam_message')</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($all_cats as $cat)
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="studiesbox">
                        <img style="width: 350px;height: 350px;" src="{{ url('/') .'/' . $cat->image }}" alt="">
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

@endsection