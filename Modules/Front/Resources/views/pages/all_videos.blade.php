@extends('front::layouts.master')

@section('content')

    <br/>
    <div class="PhotoGallerye">
        <div class="container">
    @foreach($videos as $video)
        @php
                $serial = explode('?v=',$video->link);
                //dd($serial[1]);
        @endphp
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $serial[1] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
    @endforeach
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