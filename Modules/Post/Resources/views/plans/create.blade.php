@extends('adminpanel::layouts.master')

@section('content')

    <section class="content-header">
        <h1 style="font-family: 'Cairo', sans-serif;">
            @lang('post::post.plans')
            <small>@lang('adminpanel::adminpanel.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
            <li><a href="{{route('plans.index') }}"><i class="fa fa-photo"></i> @lang('post::post.plans')</a></li>
            <li class="active">@lang('adminpanel::adminpanel.add')</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $title }}</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="{{ $loop->first ? 'active' : '' }}">
                                            <a  class="btn btn-warning" href="#tab_{{ $localeCode }}" data-toggle="tab">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab_{{ $localeCode }}">

                                            <div class="box">
                                                <div class="box-header">
                                                    <h3 class="box-title">{{ $title }}</h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    {!! Form::open(['route' => 'plans.store']) !!}


                                                    <div class="form-group">
                                                        {!! Form::label('date' ,  trans('post::post.date')  . ' ( ' . $properties['native'] . ' ) ' ) !!}
                                                        {!! Form::text( $localeCode.'[date]' , old('date') , ['placeholder' => trans('post::post.date') , 'class' => 'form-control'] ) !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('currency' ,  trans('post::post.currency')  . ' ( ' . $properties['native'] . ' ) ' ) !!}
                                                        {!! Form::text( $localeCode.'[currency]' , old('currency') , ['placeholder' => trans('post::post.currency') , 'class' => 'form-control'] ) !!}
                                                    </div>

                                                </div>
                                                <!-- /.box-body -->
                                            </div>

                                        </div>
                                    @endforeach

                                    <div class="form-group">
                                        {!! Form::label('money' ,  trans('post::post.money') ) !!}
                                        {!! Form::text( 'money' , old('money') , ['placeholder' => trans('post::post.money') , 'class' => 'form-control'] ) !!}
                                    </div>
                                        

                                    {!! Form::submit( trans('adminpanel::adminpanel.add') , ['class' => 'btn btn-primary'] ) !!}
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>

                    </div>

    </section>

@endsection