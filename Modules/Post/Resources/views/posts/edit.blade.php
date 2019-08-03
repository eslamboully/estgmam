@extends('adminpanel::layouts.master')

@section('content')

@push('css')
    <link rel="stylesheet" href="{{ admin_design('/bower_components/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ admin_design('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">


@endpush

@push('js')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="{{ admin_design('bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{ admin_design('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ admin_design('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script src="{{ admin_design('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    CKEDITOR.replace('desc')
      $('.textarea').wysihtml5();

    CKEDITOR.replace('include')
    $('.textarea').wysihtml5();

    CKEDITOR.replace('not_include')
    $('.textarea').wysihtml5();

    CKEDITOR.replace('note')
    $('.textarea').wysihtml5();

    CKEDITOR.config.language = "{{ app()->getLocale() }}";

    $('.select2').select2();

    // Dropzone.autoDiscover = false;

    // $('#album').dropzone({

    //     paramName:'image',
    //     uploadMultiple:true,
    //     maxFileSize:5,
    //     acceptedFiles:'images/*',
    //     addRemoveLinks:true,
    //     dictDefaultMessage:@lang('trip::trip.album_default_message'),
    //     dictRemoveFile:'{{ trans('adminpanel::adminpanel.delete')}}',
    //     params:{
    //         _token:"{{ csrf_token() }}"
    //     }

    // });

 })
</script>

@endpush

<section class="content-header">
    <h1 style="font-family: 'Cairo', sans-serif;">
        @lang('adminpanel::adminpanel.edit')
        <small>@lang('admin::admin.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('admin::admin.home')</a></li>
        <li><a href="{{route('trips.index') }}"><i class="fa fa-user-secret"></i> @lang('adminpanel::adminpanel.edit')</a></li>
        <li class="active">@lang('adminpanel::adminpanel.add')</li>
    </ol>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a  class="btn btn-warning" href="#title_and_desc" data-toggle="tab">
                            @lang('trip::trip.title_and_desc')
                        </a>
                    </li>

                    <li>
                        <a  class="btn btn-warning" href="#payment" data-toggle="tab">
                            @lang('trip::trip.payment')
                        </a>
                    </li>

                    <li>
                        <a  class="btn btn-warning" href="#other_data" data-toggle="tab">
                            @lang('trip::trip.other_data')
                        </a>
                    </li>



                </ul>


                <div class="tab-content">

                    <div class="tab-pane active" id="title_and_desc">


                        {!! Form::open(['route' => ['posts.update',$post->id] , 'files' => true]) !!}
                        @method('put')
                        <div class="form-group">
                            {!! Form::label('desc' ,  trans('trip::trip.desc') ) !!}
                            {!! Form::textarea('desc' , $post->desc , ['id' => 'desc' , 'class' => 'form-control'] ) !!}

                        </div>



                    </div>

                    <div class="tab-pane" id="payment">

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('trip::trip.payment_attach')</label>
                            <br/>
                            <input type="file" id="files" name="image" class="hidden">
                            <input type="image" id="image" src="{{ asset($post->image) }}" style="width: 700px;height: 700px;">
                        </div>

                    </div>

                    <div class="tab-pane" id="other_data">


                        <div class="form-group">
                            {!! Form::label('user_id' ,  trans('user::user.user') ) !!}
                            {!! Form::number('user_id' , $post->user_id , ['placeholder' => trans('user::user.user') , 'id' => 'user_id' , 'class' => 'form-control'] ) !!}
                        </div>
                        {{--

                                                    <div class="form-group">
                                                        {!! Form::label('album' ,  trans('trip::trip.album') ) !!}
                                                        <div class="dropzone" id="album"></div>
                                                    </div>
                         --}}
                        <div class="form-group">
                            <label>@lang('trip::trip.status')</label>
                            <select name="status" class="form-control">
                                <option {{ $post->status == 'active' ? 'selected' : '' }} value="active">@lang('trip::trip.active')</option>
                                <option {{ $post->status == 'pending' ? 'selected' : '' }} value="pending">@lang('trip::trip.pending')</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>@lang('post::post.choose_plan')</label>
                            <select name="plan_id" class="form-control">
                                @foreach($plans as $plan)
                                    <option {{ $plan->id == $post->plan_id ? 'selected' : '' }} value="{{ $plan->id }}">{{ $plan->date }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('started_at' ,  trans('trip::trip.started_at')  ) !!}
                            {!! Form::date( 'started_at' , $post->started_at , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ended_at' ,  trans('trip::trip.ended_at')  ) !!}
                            {!! Form::date( 'ended_at' , $post->ended_at , ['class' => 'form-control'] ) !!}
                        </div>

                        {!! Form::submit( trans('adminpanel::adminpanel.edit') , ['class' => 'btn btn-primary'] ) !!}
                        {!! Form::close() !!}
                    </div>



                </div>

            </div>
            <!-- nav-tabs-custom -->
        </div>

    </div>


</section>

@endsection

@push('js')
    <script>
        $('#admins').addClass('active');
        $('.ac li').first().addClass('active');
        $('.aw div').first().addClass('active');

        document.getElementById("files").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
        $(document).on('click','#image',function () {
            $('#files').click();
            return false;
        });
    </script>
@endpush