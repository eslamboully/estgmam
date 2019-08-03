@extends('front::layouts.master')

@section('content')
    @if(auth()->user()->posts->count() > 0)
        <div class="cement-section">
            <div class="container">
                <div class="row">
                    @foreach(auth()->user()->posts as $post)
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <a href="{{ route('edit_ads',['id'=>$post->id,'ad_type'=>$post->plan_id]) }}" style="color: white;font-family: 'Cairo', sans-serif;" class="btn btn-success btn-sm">@lang('front::front.edit')</a>
                        <a href="{{ route('show_ads_gettto',$post->id) }}">
                            <div class="HR font-good">
                                <div class="img">
                                    <img src="{{ url('/upload/posts/'.$post->photo1) }}" alt="" title="" />
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 title">
                                    <p>{{ $post->plan->date }}</p>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 time T-M">
                                        <span>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 inbout">
                                    <div class="A-N">
                                        <span>
                                            @lang('front::front.pay_done')
                                        </span>
                                        <span>

                                            @if($post->image == 'upload/posts/default.png')
                                               @lang('front::front.no')
                                             @else
                                                @lang('front::front.yes')
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 inbout">
                                    <div class="A-N">
                                        <span>
                                            @lang('front::front.status')
                                        </span>
                                        <span>
                                            @if($post->status  == 'active')
                                                @lang('front::front.active')
                                            @else
                                                @lang('front::front.pending')
                                            @endif
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <h2 style="text-align:center;font-family: 'Cairo', sans-serif;padding-top: 20px;">@lang('front::front.sorry_not_found_ads')</h2>
    @endif
@endsection
