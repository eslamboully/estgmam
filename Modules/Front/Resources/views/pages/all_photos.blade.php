@extends('front::layouts.master')

@section('content')

    @if($photos->count() > 0)
        <section class="our-gallery pb-120 of-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 text-center">
                        <div class="st">
                            <h2 class="font-good">@lang('front::front.photo_trips')</h2>
                            <hr class="sseprator">
                            <p>@lang('front::front.message_trips')</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="gallery-items">

                            <div class="PhotoGallery">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="gallery-items">
                                                @foreach($photos as $photo)
                                                    <div class="hr">
                                                        <a href="{{ asset($photo->image) }}">
                                                            <img src="{{ asset($photo->image) }}" alt="" />

                                                                @csrf


                                                        </a>
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('front::front.sorry_not_found_photos')</h2>
    @endif

{{--        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('front::front.sorry_not_found_trips')</h2>--}}


    <section class="footer-wrapper">
        <div class="container cont_border">
            <ul>
                <li><a href="{{ route('commission') }}">@lang('config::config.commission')</a></li>
                <li><a href="{{ route('install_advertising') }}">@lang('config::config.install_advertising')</a></li>
                <li><a href="{{ route('laws') }}">@lang('config::config.laws')</a></li>
                <li><a href="{{ route('why_banned') }}">@lang('config::config.why_banned')</a></li>
                <li><a href="{{ route('what_i_do') }}">@lang('config::config.what_i_do')</a></li>
                <li><a href="#">@lang('config::config.contact_us')</a></li>
                @if(auth()->check())
                    <li><a href="{{ route('user_logout') }}">@lang('front::front.logout')</a></li>
                @endif
            </ul>
        </div>
    </section>

    <div id="del_admon" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('adminpanel::adminpanel.delete')</h4>
                </div>
                <div class="modal-body">

                    <h4>@lang('front::front.del_message')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">@lang('adminpanel::adminpanel.close')</button>
                    <button type="button" class="btn btn-success btn_del_okay" data-dismiss="modal">@lang('front::front.confirm')</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('front::front.add_photo')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('create_photo') }}" id="form_add_photos" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab_{{ $localeCode }}">
                                <div class="form-group">
                                    {!! Form::label('title' ,  trans('front::front.title_'.$localeCode) ) !!}
                                    {!! Form::text( $localeCode.'[title]' , old('title') , ['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                                    <!-- /.box-body -->
                        @endforeach

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('front::front.image_good')</label>
                            <br/>
                            <input type="file" hidden="hidden" id="files" name="image" class="hidden">
                            <input type="image" id="image" src="{{ asset('default.png') }}" style="width: 465px;height: 400px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('front::front.close')</button>
                        <button type="button" id="add_the_photo" class="btn btn-primary">@lang('front::front.add_photo')</button>
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

        $('#add_the_photo').on('click',function () {
            $('#form_add_photos').submit();
        });
    </script>
@endpush
