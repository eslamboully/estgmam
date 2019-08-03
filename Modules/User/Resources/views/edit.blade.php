@extends('adminpanel::layouts.master')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Cairo', sans-serif;">
            @lang('user::user.users')
            <small>@lang('adminpanel::adminpanel.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
            <li><a href="{{route('users.index') }}"><i class="fa fa-user"></i> @lang('user::user.users')</a></li>
            <li class="active">@lang('adminpanel::adminpanel.edit')</li>
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
            <div class="box-body">
              {!! Form::open(['route' => ['users.update' , $user->id]  , 'files' => true, 'method' => 'PUT']) !!}
              <div class="form-group">
                {!! Form::label('full_name' ,  trans('user::user.full_name')) !!}
                {!! Form::text('full_name' , $user->full_name , ['class' => 'form-control'] ) !!}
              </div>

                {!! Form::hidden('id' ,  $user->id ) !!}

                <div class="form-group">
                    {!! Form::label('country' ,  trans('admin::admin.country')) !!}
                    {!! Form::text('country' , $user->country , ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('state' ,  trans('admin::admin.state')) !!}
                    {!! Form::text('state' , $user->state , ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone' ,  trans('admin::admin.phone')) !!}
                    {!! Form::text('phone' , $user->phone , ['class' => 'form-control'] ) !!}
                </div>

              <div class="form-group">
                {!! Form::label('email' ,  trans('user::user.email') ) !!}
                {!! Form::email('email' , $user->email , ['class' => 'form-control'] ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('image' ,  trans('user::user.image') ) !!}
                {!! Form::file('image' , ['id' => 'image' , 'class' => 'form-control'] ) !!}
              </div>

              <div class="form-group">
                <img id="blah" width="100px" height="100px" class="img-thumbnail" src="{{ asset($user->image) }}" alt="your image" />
              </div>

              <div class="form-group">
                {!! Form::label('password' ,  trans('user::user.password') ) !!}
                {!! Form::password('password' , ['class' => 'form-control'] ) !!}
              </div>

                <div class="form-group">
                    <select name="status" class="form-control">
                        <option {{ $user->status == 1 ? 'selected' : '' }} value="1">@lang('admin::admin.active')</option>
                        <option {{ $user->status == 0 ? 'selected' : '' }} value="0">@lang('admin::admin.pending')</option>
                    </select>
                </div>

              {!! Form::submit( trans('adminpanel::adminpanel.edit') , ['class' => 'btn btn-primary'] ) !!}
              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
    </div>

@stop