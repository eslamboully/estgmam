@extends('adminpanel::layouts.master')

@section('content')

@push('css')
  <link rel="stylesheet" href="{{ admin_design('/jstree/themes/default/style.css') }}">

  <link rel="stylesheet" href="{{ admin_design('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

@endpush

@push('js')
<script src="{{ admin_design('bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{ admin_design('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ admin_design('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script src="{{ admin_design('jstree/jstree.js') }}"></script>
<script src="{{ admin_design('jstree/jstree.checkbox.js') }}"></script>

<script src="{{ admin_design('jstree/jstree.wholerow.js') }}"></script>

<script>
  $(function () {
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    CKEDITOR.replace('{{ $localeCode .'[desc]' }}')
    $('.textarea').wysihtml5()

    @endforeach

    CKEDITOR.config.language = "{{ app()->getLocale() }}";

  $('#jstree').jstree({

      "core" : {
        'data' : {!! load_destinations( $destination->parent_id , $destination->id ) !!},
        "themes" : {
          "variant" : "large"
        }
      },
      "checkbox" : {
        "keep_selected_style" : false
      },
      "plugins" : [ "wholerow"]
    });

  });

  $('#jstree').on('changed.jstree', function(e , data) {

    var destinations = [];

    for (var i = 0 , j = data.selected.length ; i < j; i++) {

      selected_data = data.selected[i];

      destinations.push( data.instance.get_node(selected_data).id );

    };

    $('#parent_id').val( destinations.join(',') )

   });

</script>

@endpush
<section class="content-header">
    <h1 style="font-family: 'Cairo', sans-serif;">
        @lang('trip::destination.destinations')
        <small>@lang('adminpanel::adminpanel.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
        <li><a href="{{route('destinations.index') }}"><i class="fa fa-user-secret"></i> @lang('admin::admin.destinations')</a></li>
        <li class="active">@lang('adminpanel::adminpanel.edit')</li>
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
                    {!! Form::open(['method' => 'PUT' , 'route' => ['destinations.update' , $destination->id] , 'files' => true]) !!}

                    {!! Form::hidden('id', $destination->id) !!}
                    <div class="form-group">
                      {!! Form::label('title' ,  trans('trip::destination.title')  . ' ( ' . $properties['native'] . ' ) ' ) !!}
                      {!! Form::text( $localeCode.'[title]' , $destination->translate($localeCode)->title , ['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('desc' ,  trans('trip::destination.desc') . ' ( ' . $properties['native'] . ' ) ' ) !!}
                      {!! Form::textarea($localeCode .'[desc]' , $destination->translate($localeCode)->desc , ['id' => 'desc' , 'class' => 'form-control'] ) !!}
                    </div>

                  </div>
                  <!-- /.box-body -->
                </div>

              </div>
             @endforeach




            </div>
            <!-- /.tab-content -->

                    <input type="hidden" name="parent_id" id="parent_id" value="{{ old('parent_id') }}">

                    <div id="jstree"></div>

                    <div class="form-group">
                      {!! Form::label('image' ,  trans('trip::destination.image') ) !!}
                      {!! Form::file('image' , ['id' => 'image' , 'class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                      <img id="blah" width="100px" height="100px" class="img-thumbnail" src="{{ url($destination->image) }}" alt="your image" />
                    </div>

                    {!! Form::submit( trans('adminpanel::adminpanel.edit') , ['class' => 'btn btn-primary'] ) !!}
                    {!! Form::close() !!}
          </div>
          <!-- nav-tabs-custom -->
        </div>

      </div>

</section>


@endsection