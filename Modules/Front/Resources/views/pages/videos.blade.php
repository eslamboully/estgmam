@extends('front::layouts.master')

@section('content')
    <div class="AD_Your_ad">
        <a href="">
            <button type="button" data-toggle="modal" id="add_ads" data-target="#exampleModalLong" name="button">
                <i class="fa fa-plus"></i>
                @lang('front::front.add_video')
            </button>
        </a>
    </div>
    <br/>
    @if(auth()->user()->videos->count() > 0)
    <div class="PhotoGallerye">
        <div class="container">
    @foreach(auth()->user()->videos as $video)
        @php
                $serial = explode('?v=',$video->link);
                //dd($serial[1]);
        @endphp
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $serial[1] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
    @endforeach
        </div>
    </div>
    @else
        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('front::front.sorry_not_found_videos')</h2>
    @endif





    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('front::front.add_video')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('create_video') }}" id="form_add_photos" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab_{{ $localeCode }}">
                                <div class="form-group">
                                    {!! Form::label('title' ,  trans('front::front.title_'.$localeCode) ) !!}
                                    {!! Form::text( $localeCode.'[title]' , old('title') , ['class' => 'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab_{{ $localeCode }}">
                                <div class="form-group">
                                    {!! Form::label('desc' ,  trans('front::front.desc_'.$localeCode) ) !!}
                                    {!! Form::textarea( $localeCode.'[desc]' , old('desc') , ['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                            <!-- /.box-body -->
                        @endforeach

                        <div class="form-group">
                            <label>@lang('front::front.link')</label>
                            <input class="form-control" type="text" name="link" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('front::front.close')</button>
                        <button type="button" id="add_the_photo" class="btn btn-primary">@lang('front::front.add_video')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $('.del_trip').on('click',function () {
            $('#del_admon').modal('show');
            return false;
        });
        $('.btn_del_okay').on('click',function () {
            $('.submit_btn').submit();
            return false;
        });

        $('#add_ads').on('click',function (e) {
            e.preventDefault();
        });



        $('#add_the_photo').on('click',function () {
            $('#form_add_photos').submit();
        });
    </script>
@endpush