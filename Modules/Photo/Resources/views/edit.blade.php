@extends('adminpanel::layouts.master')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Cairo', sans-serif;">
            @lang('photo::photo.photos')
            <small>@lang('adminpanel::adminpanel.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
            <li><a href="{{route('photos.index') }}"><i class="fa fa-photo"></i> @lang('photo::photo.photos')</a></li>
            <li class="active">@lang('adminpanel::adminpanel.add')</li>
        </ol>
    </section>

<section class="content">

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
                    {!! Form::open(['route' => ['photos.update' , $photo->id] , 'files' => true , 'method' => 'PUT']) !!}


                    <div class="form-group">
                      {!! Form::label('title' ,  trans('photo::photo.title')  . ' ( ' . $properties['native'] . ' ) ' ) !!}
                      {!! Form::text( $localeCode.'[title]' , $photo->translate($localeCode)->title , ['class' => 'form-control'] ) !!}
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>

              </div>
             @endforeach

                    <div class="form-group">
                      {!! Form::label('image' ,  trans('photo::photo.image') ) !!}
                      {!! Form::file('image' , ['id' => 'image' , 'class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                      <img id="blah" width="100px" height="100px" class="img-thumbnail" src="{{ url($photo->image) }}" alt="your image" />
                    </div>

                    {!! Form::submit( trans('adminpanel::adminpanel.edit') , ['class' => 'btn btn-primary'] ) !!}
                    {!! Form::close() !!}
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>

      </div>

</section>


@endsection