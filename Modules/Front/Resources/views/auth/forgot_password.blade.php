@extends('front::layouts.master')

@section('content')

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs text-center">
            <div class="container">
                <div class="page-header">
                    <h1>Forgot Password</h1>
                </div>
            </div>
        </section>
        <!-- /BREADCRUMBS -->


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">

                        @if(session('success'))

                            <div class="alert alert-success">
                                <p>{{ session('success') }}</p>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('forgot_password') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="Your Email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-lg-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" style="width: 100%">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop