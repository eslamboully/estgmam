@extends('front::layouts.master')

@section('content')

    <!-- BreadCrumb Start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="header">
                <!-- Start Select -->
{{--                <div class="custom-selec font-good">--}}
{{--                    <select>--}}
{{--                        <option value="0">المدينه</option>--}}
{{--                        <option value="1">Audi</option>--}}
{{--                        <option value="2">BMW</option>--}}
{{--                        <option value="3">Citroen</option>--}}
{{--                        <option value="4">Ford</option>--}}
{{--                        <option value="5">Honda</option>--}}
{{--                        <option value="6">Jaguar</option>--}}
{{--                        <option value="7">Land Rover</option>--}}
{{--                        <option value="8">Mercedes</option>--}}
{{--                        <option value="9">Mini</option>--}}
{{--                        <option value="10">Nissan</option>--}}
{{--                        <option value="11">Toyota</option>--}}
{{--                        <option value="12">Volvo</option>--}}
{{--                    </select>--}}

{{--                    <select>--}}
{{--                        <option value="0">الدوله</option>--}}
{{--                        <option value="1">Audi</option>--}}
{{--                        <option value="2">BMW</option>--}}
{{--                        <option value="3">Citroen</option>--}}
{{--                        <option value="4">Ford</option>--}}
{{--                        <option value="5">Honda</option>--}}
{{--                        <option value="6">Jaguar</option>--}}
{{--                        <option value="7">Land Rover</option>--}}
{{--                        <option value="8">Mercedes</option>--}}
{{--                        <option value="9">Mini</option>--}}
{{--                        <option value="10">Nissan</option>--}}
{{--                        <option value="11">Toyota</option>--}}
{{--                        <option value="12">Volvo</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="SEARCH font-good">--}}
{{--                    <button type="search" name="button">--}}
{{--                        <i class="fa fa-search"></i>--}}
{{--                        بحث خرائط--}}
{{--                    </button>--}}
{{--                    <button type="search" name="button">--}}
{{--                        <i class="fa fa-search"></i>--}}
{{--                        بحث عادي--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- BreadCrumb End -->


    <!-- Our Gallery Start -->

    <section class="our-gallery p120 of-hidden gallery-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 text-center">
                    <div class="st">
                        <h2 style="font-size:25px" class="font-good">{{ $category->title }}</h2>
                        <hr class="sseprator">
                        <!-- <p class="font-good">اليكم بعض الصور المقتطفة من بعض الرحلات مع كباتن البحر ورحلات الغوص ورحلات الصيد ورحلات النزهة العائلية وغيرها</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Gallery End -->

    <div class="Add_form font-good">
        <div class="container">
            <a href="{{ route('create_front_trip','cat_id='.$category->id) }}">
                <button class="font-good" type="button" name="button">{{ __('front::front.add_ads') }}</button>
            </a>
        </div>
    </div>

    @if($activeCats->count() > 0)
        <div class="cement-section">
            <div class="container">
                <div class="row">
                    @foreach($activeCats as $trip)
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
                            <div class="Edit">
                                <form class="submit_btn" method="post" action="{{ route('trips.destroy',$trip->id) }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('front::front.message_cats_nor')</h2>
    @endif
@endsection