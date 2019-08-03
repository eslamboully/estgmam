@extends('front::layouts.master')

@section('content')
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach([$post->photo1,$post->photo2,$post->photo3,$post->photo4,$post->photo5,$post->photo6] as $photo)
                    <div class="carousel-item active">
                    <img width="1110px" height="557px" src="{{ url('/upload/posts/'.$photo) }}" class="d-block w-100" alt="...">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- .................................... -->

    <div class="Communication_Data">
        <div class="container">
            <div class="Cale">
                <p>@lang('front::front.owner_ads')</p>
                <ul>
                    <li><a href="tel:00966591930061">{{ $post->user->phone }} <i class="fa fa-phone"></i></a></li>
                </ul>
            </div>
            <div class="description">
                <p>{{ $post->desc }}</p>
            </div>
        </div>
    </div>
@endsection