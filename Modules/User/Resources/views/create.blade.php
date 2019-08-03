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
            <div class="box-body">
              {!! Form::open(['route' => 'users.store' , 'files' => true]) !!}
              <div class="form-group">
                {!! Form::label('full_name' ,  trans('user::user.full_name')) !!}
                {!! Form::text('full_name' , old('full_name') , ['class' => 'form-control' , 'placeholder' =>trans('user::user.full_name')  ] ) !!}
              </div>

              <div class="form-group">
                {!! Form::label('email' ,  trans('user::user.email') ) !!}
                {!! Form::email('email' , old('email') , ['class' => 'form-control' , 'placeholder' =>  trans('user::user.email')] ) !!}
              </div>

                <div class="form-group">
                    {!! Form::label('country' ,  trans('admin::admin.country')) !!}
                    {!! Form::text('country' , old('country') , ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('state' ,  trans('admin::admin.state')) !!}
                    {!! Form::text('state' , old('state') , ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone' ,  trans('admin::admin.phone')) !!}
                    {!! Form::text('phone' , old('phone') , ['class' => 'form-control'] ) !!}
                </div>

              <div class="form-group">
                {!! Form::label('password' ,  trans('user::user.password') ) !!}
                {!! Form::password('password' , ['class' => 'form-control' , 'placeholder' => trans('user::user.password') ] ) !!}
              </div>

                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="1">@lang('admin::admin.active')</option>
                        <option value="0">@lang('admin::admin.pending')</option>
                    </select>
                </div>

              <div class="form-group">
                {!! Form::label('image' ,  trans('user::user.image') ) !!}
                {!! Form::file('image' , ['id' => 'image' , 'class' => 'form-control' , 'placeholder' => trans('user::user.image')  ] ) !!}
              </div>

              <div class="form-group">
                <img id="blah" width="100px" height="100px" class="img-thumbnail" src="{{ url('upload/users/default.png') }}" alt="your image" />
              </div>

              {!! Form::submit( trans('adminpanel::adminpanel.add_new') , ['class' => 'btn btn-primary'] ) !!}
              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
            </div>
        </div>
    </section>
@endsection