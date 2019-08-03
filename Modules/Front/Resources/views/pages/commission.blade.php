@extends('front::layouts.master')

@section('content')

        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('config::config.commission')</h2>
        <div style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;" class="form-group">
            {!! $config['commission'] !!}
        </div>
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