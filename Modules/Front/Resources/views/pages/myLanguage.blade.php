@extends('front::layouts.master')

@section('content')
<div class="TheLanguage">
    <div class="container">
        <form action="#" method="post">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" >
                    <label class="cont"> {{ $properties['native'] }}
                        <input {{ App()->getLocale() == 'ar' ? 'checked' : '' }} value="en" name="lang">
                        <span class="checkmark"></span>
                    </label>
                </a>
            @endforeach
{{--            <label class="cont">@lang('front::front.arabic')--}}
{{--                <input type="radio" {{ App()->getLocale() == 'ar' ? 'checked' : '' }} value="ar" name="lang">--}}
{{--                <span class="checkmark"></span>--}}
{{--            </label>--}}

        </form>
{{--        <button class="change_lang">@lang('front::front.save_changes')</button>--}}
    </div>
</div>

{{--<ul>--}}
{{--    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--        <li>--}}
{{--            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                {{ $properties['native'] }}--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
@endsection
@push('js')
    <script>
        $('.change_lang').on('click',function () {
            $('.class_change_lang').submit();
        });
    </script>
@endpush