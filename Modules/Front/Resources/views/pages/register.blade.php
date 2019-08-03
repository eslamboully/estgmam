@extends('front::layouts.master')

@section('content')
    <div class="signup">
        <div class="container">
            <div class="SIGN">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="" id="login_form" action="{{ route('user.register.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{ old('full_name') }}" name="full_name" />
                    <label>@lang('user::user.full_name')</label>

                    <input type="email" value="{{ old('email') }}" name="email" />
                    <label>@lang('front::front.email')</label>

                    <input type="text" value="{{ old('country') }}" name="country" />
                    <label>@lang('front::front.country')</label>

                    <input type="text" value="{{ old('state') }}" name="state" />
                    <label>@lang('front::front.state')</label>

                    <input type="text" value="{{ old('phone') }}" name="phone" />
                    <label>@lang('front::front.phone')</label>

                    <input type="password" name="password" />
                    <label>@lang('front::front.password')</label>

                        <input type="file" name="image" />
                    <label>@lang('front::front.image')</label>

                </form>
                <button class="TSGEL" id="submit_login" type="submit" value=""/>@lang('front::front.register')</div>
            <div class="SignUp">
                <a href="{{ route('user.login') }}">@lang('front::front.login')</a>
            </div>
            <div class="I_forgot">
                <a href="#">@lang('front::front.forget_password')</a>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        $('#submit_login').on('click',function () {
            $('#login_form').submit();
        });

    </script>
@endpush