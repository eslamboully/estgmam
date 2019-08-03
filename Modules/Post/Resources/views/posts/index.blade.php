@extends('adminpanel::layouts.master')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Cairo', sans-serif;">
            @lang('post::post.posts')
            <small>@lang('admin::admin.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('admin::admin.home')</a></li>
            <li class="active">@lang('post::post.posts')</li>
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
            {!! Form::open(['id' => 'form_data' , 'url' => admin_url('posts/destroy/all') ]) !!}
            {!! Form::hidden('_method' , 'delete') !!}
            {!! $dataTable->table([
              'class' => 'dataTable table table-bordered table-striped table-hover'
            ], true) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div id="multipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger">

                        <div class="empty_record">
                            <h4>{{ trans('admin.please_check_some_records') }}</h4>
                        </div>

                        <div class="not_empty_record">
                            <h4>{{ trans('admin.ask_delete_item') }} <span class="record_count"></span> ? </h4>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <div class="empty_record">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>

                    <div class="not_empty_record">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
                        <button type="button" class="btn btn-danger del_all" name="del_all">{{ trans('admin.yes') }}</button>
                    </div>



                </div>
            </div>

        </div>
    </div>

    @push('js')

    <script>
        $(document).on('click','.btn-active',function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            var loc = $(this).parent().find('.btn-active');
            $.ajax({
                url: '{{ route('ajax_edit') }}',
                method:'post',
                data:{id:id,_token:token},
                success: function (data) {
                    if (data.status == 'active'){
                        loc.replaceWith('<button data-id='+data.id+' class="btn btn-danger btn-active">{{__('post::post.click_to_pending')}}</button>');
                    }else{
                        loc.replaceWith('<button data-id='+data.id+' class="btn btn-success btn-active">{{__('post::post.click_to_active')}}</button>');
                    }
                    $(this).removeClass('btn-success');
                }
            });
        });
        //delete_all();
    </script>

    {!! $dataTable->scripts() !!}

    @endpush


@stop
