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
                <form class="" id="login_form" action="{{ route('user.login.post') }}" method="post">
                    @csrf
                    <input type="email" name="email" />
                    <label>@lang('front::front.email')</label>

                    <input type="password" name="password" />
                    <label>@lang('front::front.password')</label>

                </form>
                <button class="TSGEL" id="submit_login" type="submit" value=""/>@lang('front::front.login')</div>
                <div class="SignUp">
                    <a href="{{ route('user_register') }}">@lang('front::front.new_login')</a>
                </div>
                <div class="I_forgot">
                    <a href="{{ route('forgot_password') }}">@lang('front::front.forget_password')</a>
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