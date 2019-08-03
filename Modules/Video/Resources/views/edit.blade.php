@extends('adminpanel::layouts.master')

@section('content')



@push('css')
  <link rel="stylesheet" href="{{ admin_design('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

@endpush

@push('js')
  <script src="{{ admin_design('bower_components/fastclick/lib/fastclick.js')}}"></script>

  <script src="{{ admin_design('bower_components/ckeditor/ckeditor.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ admin_design('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>



  <script>
    $(function () {
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        CKEDITOR.replace('{{ $localeCode .'[desc]' }}')
        $('.textarea').wysihtml5();

      @endforeach
      CKEDITOR.config.language = "{{ app()->getLocale() }}";
    });

  </script>

@endpush






    <section class="content-header">
        <h1 style="font-family: 'Cairo', sans-serif;">
            @lang('video::video.videos')
            <small>@lang('adminpanel::adminpanel.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
            <li><a href="{{route('videos.index') }}"><i class="fa fa-photo"></i> @lang('video::video.videos')</a></li>
            <li class="active">{{ $title }}</li>
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
                    {!! Form::open(['route' => ['videos.update' , $video->id] , 'method' => 'PUT' , 'files' => true]) !!}


                    <div class="form-group">
                      {!! Form::label('title' ,  trans('video::video.title')  . ' ( ' . $properties['native'] . ' ) ' ) !!}
                      {!! Form::text( $localeCode.'[title]' , $video->translate($localeCode)->title , ['placeholder' => trans('video::video.title') , 'class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('desc' ,  trans('video::video.desc')  . ' ( ' . $properties['native'] . ' ) ' ) !!}
                      {!! Form::textarea( $localeCode.'[desc]' , $video->translate($localeCode)->desc , ['placeholder' => trans('video::video.desc') , 'class' => 'form-control'] ) !!}
                    </div>

                  </div>
                  <!-- /.box-body -->
                </div>

              </div>
             @endforeach

                    <div class="form-group">
                      {!! Form::label('link' ,  trans('video::video.link') ) !!}
                      {!! Form::text( 'link' , $video->link , ['placeholder' => trans('video::video.link') , 'class' => 'form-control'] ) !!}
                    </div>

                    {!! Form::submit( $title , ['class' => 'btn btn-primary'] ) !!}
                    {!! Form::close() !!}
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>

      </div>

</section>


@endsection