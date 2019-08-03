@if($status == 'active')
    <button class="btn btn-danger btn-active" data-id="{{ $id }}">@lang('post::post.click_to_pending')</button>
@else
    <button class="btn btn-success btn-active" data-id="{{ $id }}">@lang('post::post.click_to_active')</button>
@endif
