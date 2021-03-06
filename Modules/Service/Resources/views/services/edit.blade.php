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
<script src="{{ admin_design('jstree/jstree.wholerow.js') }}"></script>

<script>
  $(function () {

    CKEDITOR.replace('desc')
    $('.textarea').wysihtml5()
    CKEDITOR.config.language = "{{ app()->getLocale() }}";

  $('#jstree').jstree({

    "core" : {
      "data":{!! load_services_categories($service->category_id) !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : false
    },
    "plugins" : [ "wholerow" ]

  });

   $('#jstree').on('changed.jstree', function(e , data) {

    var categories = [];

    for (var i = 0 , j = data.selected.length ; i < j; i++) {

      selected_data = data.selected[i];

      categories.push( data.instance.get_node(selected_data).id );

    };

    $('#category_id').val( categories.join(',') )

   });

 })
</script>

@endpush

<section class="content-header">
    <h1 style="font-family: 'Cairo', sans-serif;">
        @lang('service::service.services')
        <small>@lang('adminpanel::adminpanel.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
        <li><a href="{{route('services.index') }}"><i class="fa fa-user-secret"></i> @lang('service::service.services')</a></li>
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
                    {!! Form::open(['route' => ['services.update' , $service->id] , 'method' => 'PUT' , 'files' => true]) !!}


                    <div class="form-group">
                      {!! Form::label('title' ,  trans('service::service.title')  ) !!}
                      {!! Form::text( 'title' , $service->title , ['class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('price' ,  trans('service::service.price')  ) !!}
                      {!! Form::number( 'price' , $service->price , ['class' => 'form-control'] ) !!}
                    </div>


                    <div class="form-group">
                      {!! Form::label('desc' ,  trans('service::service.desc') ) !!}
                      {!! Form::textarea('desc' , $service->desc , ['id' => 'desc' , 'class' => 'form-control'] ) !!}
                    </div>

                  </div>
                  <!-- /.box-body -->
                </div>
        </div>
    </div>
</section>


                    <div id="jstree"></div>

                    {!! Form::hidden('category_id', $service->category_id,  ['id' => 'category_id']) !!}

                    <div class="form-group">
                      {!! Form::label('image' ,  trans('service::category.image') ) !!}
                      {!! Form::file('image' , ['id' => 'image' , 'class' => 'form-control'] ) !!}
                    </div>

                    <div class="form-group">
                      <img id="blah" width="100px" height="100px" class="img-thumbnail" src="{{ url($service->image) }}" alt="your image" />
                    </div>

                    <div class="form-group">
                      {!! Form::label('user_id' ,  trans('user::user.user')  ) !!}
                      {!! Form::number( 'user_id' , $service->user_id , ['class' => 'form-control'] ) !!}
                    </div>

                    {!! Form::submit( trans('adminpanel::adminpanel.add') , ['class' => 'btn btn-primary'] ) !!}
                    {!! Form::close() !!}



@endsection