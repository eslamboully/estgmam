<a class="btn btn-primary" href="{{ route('plans.edit' , $id) }}" >
  <i class="fa fa-edit"></i>
</a>

@if($id != 1)
  <a class="btn btn-danger" href="{{ route('plans.destroy' , $id) }}" data-toggle="modal" data-target="#del_admin{{ $id }}">
    <i class="fa fa-trash"></i>
  </a>
@endif






  <div id="del_admin{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@lang('adminpanel::adminpanel.delete')</h4>
      </div>
      {!! Form::open(['route'=>['plans.destroy',$id],'method'=>'DELETE']) !!}
      <div class="modal-body">

      	@php
      		$post = trans('post::post.plans')
      	@endphp

        <h4>@lang('adminpanel::adminpanel.sure_delete_this')</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">@lang('adminpanel::adminpanel.close')</button>
        {!! Form::submit(trans('adminpanel::adminpanel.yes'),['class'=>'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>