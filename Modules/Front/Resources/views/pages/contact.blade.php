@extends('front::layouts.master')

@section('content')
<div class="My_details">
    <form action="{{ route('contact_post') }}" method="post" style="max-width:500px;margin:auto">
        @csrf
        <h4 class="font-good text-center">@lang('front::front.contact_us')</h4>
        <div class="input-container">
            <input class="input-field" type="text" placeholder="@lang('front::front.user_name')" name="name">
            <i class="fa fa-user icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="email"  placeholder="@lang('front::front.email')" name="email">
            <i class="fa fa-user icon"></i>
        </div>

        <div class="input-container">
            <input class="input-field" type="text" placeholder="@lang('front::front.subject')" name="subject">
            <i class="fa fa-globe-americas icon"></i>
        </div>

        <div class="input-container">
            <textarea class="input-field" name="message">
            </textarea>
            <i class="fa fa-facebook-messenger icon"></i>
        </div>

        <button type="submit" class="btn">@lang('front::front.send')</button>
    </form>
</div>
@endsection
