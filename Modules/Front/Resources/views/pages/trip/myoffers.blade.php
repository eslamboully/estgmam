@extends('front::layouts.master')

@section('content')
    @if(auth()->user()->trips->count() > 0)
        <div style="text-align: center" class="cement-section">
            <div class="container">
                <div class="row">
                    @foreach(auth()->user()->trips as $trip)
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <a href="blog-filter.html">
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
                                <a class="btn btn-danger btn-sm del_trip" style="color: white;font-family: 'Cairo', sans-serif;">@lang('front::front.delete')</a>
                                <a href="{{ route('my_trips_trip',$trip->id) }}" style="color: white;font-family: 'Cairo', sans-serif;" class="btn btn-success btn-sm">@lang('front::front.edit')</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('front::front.sorry_not_found_trips')</h2>

    @endif
    <section class="footer-wrapper">
        <div class="container cont_border">
            <ul>
                <li><a href="{{ route('commission') }}">@lang('config::config.commission')</a></li>
                <li><a href="{{ route('install_advertising') }}">@lang('config::config.install_advertising')</a></li>
                <li><a href="{{ route('laws') }}">@lang('config::config.laws')</a></li>
                <li><a href="{{ route('why_banned') }}">@lang('config::config.why_banned')</a></li>
                <li><a href="{{ route('what_i_do') }}">@lang('config::config.what_i_do')</a></li>
                <li><a href="#">@lang('config::config.contact_us')</a></li>
                @if(auth()->check())
                    <li><a href="{{ route('user_logout') }}">@lang('front::front.logout')</a></li>
                @endif
            </ul>
        </div>
    </section>

    <div id="del_admon" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('adminpanel::adminpanel.delete')</h4>
                </div>
                <div class="modal-body">

                    <h4>@lang('front::front.del_message')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">@lang('adminpanel::adminpanel.close')</button>
                    <button type="button" class="btn btn-success btn_del_okay" data-dismiss="modal">@lang('front::front.confirm')</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.del_trip').on('click',function () {
            $('#del_admon').modal('show');
            return false;
        });
        $('.btn_del_okay').on('click',function () {
            $('.submit_btn').submit();
            return false;
        });
    </script>
@endpush