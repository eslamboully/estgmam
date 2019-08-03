@extends('front::layouts.master')

@section('content')
<div class="My_details">
    <form action="{{ route('my_info_post') }}" method="post" style="max-width:500px;margin:auto">
        @csrf
        <h4 class="font-good text-center">@lang('front::front.edit_info')</h4>
        <div class="input-container">
            <input class="input-field" type="text" value="{{ auth()->user()->full_name }}" placeholder="@lang('front::front.user_name')" name="full_name">
            <i class="fa fa-user icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="email" value="{{ auth()->user()->email }}" placeholder="@lang('front::front.email')" name="email">
            <i class="fa fa-user icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="text" value="{{ auth()->user()->country }}" placeholder="@lang('front::front.country')" name="country">
            <i class="fa fa-globe-americas icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="text" value="{{ auth()->user()->state }}" placeholder="@lang('front::front.state')" name="state">
            <i class="fa fa-city icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="text" value="{{ auth()->user()->phone }}" placeholder="@lang('front::front.phone')" name="phone">
            <i class="fa fa-mobile-alt icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="password" placeholder="@lang('front::front.password2')" name="password">
            <i class="fa fa-key icon"></i>
        </div>

        <button type="submit" class="btn">@lang('front::front.save_edit')</button>
    </form>
</div>
@endsection
