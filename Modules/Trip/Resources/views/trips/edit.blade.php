@extends('adminpanel::layouts.master')

@section('content')

@push('css')
    <link rel="stylesheet" href="{{ admin_design('/bower_components/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ admin_design('plugins/boatstrap-wysihtml5/boatstrap3-wysihtml5.min.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">


@endpush

@push('js')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="{{ admin_design('bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{ admin_design('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Boatstrap WYSIHTML5 -->
<script src="{{ admin_design('plugins/boatstrap-wysihtml5/boatstrap3-wysihtml5.all.min.js')}}"></script>

<script src="{{ admin_design('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    CKEDITOR.replace('desc')
      $('.textarea').wysihtml5();

    CKEDITOR.config.language = "{{ app()->getLocale() }}";

    $('.select2').select2();


 })
</script>

@endpush

<section class="content-header">
    <h1 style="font-family: 'Cairo', sans-serif;">
        @lang('trip::trip.trips')
        <small>@lang('adminpanel::adminpanel.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.home')</a></li>
        <li><a href="{{route('trips.index') }}"><i class="fa fa-user-secret"></i> @lang('trip::trip.trips')</a></li>
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
                  <a  class="btn btn-warning" href="#desc_and_boat" data-toggle="tab">
                    @lang('trip::trip.desc_and_boat')
                  </a>
                </li>


                <li>
                  <a  class="btn btn-warning" href="#dates_adnd_prices" data-toggle="tab">
                    @lang('trip::trip.dates_adnd_prices')
                  </a>
                </li>

                <li>
                  <a  class="btn btn-warning" href="#images" data-toggle="tab">
                    @lang('trip::trip.images')
                  </a>
                </li>

            </ul>


            <div class="tab-content">

                <div class="tab-pane active" id="desc_and_boat">


                        {!! Form::open(['route' => ['trips.update' , $trip->id] , 'files' => true , 'method' => 'PUT']) !!}


                        <div class="form-group">
                                  {!! Form::label('desc' ,  trans('trip::trip.desc') ) !!}
                                  {!! Form::textarea('desc' , $trip->desc , ['id' => 'desc' , 'class' => 'form-control'] ) !!}

                        </div>

                        <div class="form-group">
                                  {!! Form::label('berth' ,  trans('trip::trip.berth')  ) !!}
                                  {!! Form::text( 'berth' , $trip->berth , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                                  {!! Form::label('boat_number' ,  trans('trip::trip.boat_number')  ) !!}
                                  {!! Form::number( 'boat_number' , $trip->boat_number , ['class' => 'form-control'] ) !!}
                        </div>


                        <div class="form-group">
                                  {!! Form::label('boat_title' ,  trans('trip::trip.boat_title')  ) !!}
                                  {!! Form::text( 'boat_title' , $trip->boat_title , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                                  {!! Form::label('passengers' ,  trans('trip::trip.passengers')  ) !!}
                                  {!! Form::number( 'passengers' , $trip->passengers , ['class' => 'form-control'] ) !!}
                        </div>


                </div>


                <div class="tab-pane" id="dates_adnd_prices">


                        <div class="form-group">
                            {!! Form::label('price' ,  trans('trip::trip.price')  ) !!}
                            {!! Form::text( 'price' , $trip->price , ['class' => 'form-control'] ) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('passenger_price' ,  trans('trip::trip.passenger_price')  ) !!}
                            {!! Form::text( 'passenger_price' , $trip->passenger_price , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date' ,  trans('trip::trip.date')  ) !!}
                            {!! Form::date( 'date' , $trip->date , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('started_at' ,  trans('trip::trip.started_at')  ) !!}
                            {!! Form::date( 'started_at' , $trip->started_at , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ended_at' ,  trans('trip::trip.ended_at')  ) !!}
                            {!! Form::date( 'ended_at' , $trip->ended_at , ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('day' ,  trans('trip::trip.day')  ) !!}
                            {!! Form::text( 'day' , $trip->day , ['class' => 'form-control'] ) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('hour' ,  trans('trip::trip.hour')  ) !!}
                            {!! Form::text( 'hour' , $trip->hour , ['class' => 'form-control'] ) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('trip_hour' ,  trans('trip::trip.trip_hour')  ) !!}
                            {!! Form::text( 'trip_hour' , $trip->trip_hour , ['class' => 'form-control'] ) !!}
                        </div>

                </div>

                <div class="tab-pane" id="images">


                            <div class="form-group">
                                {!! Form::label('categories' ,  trans('trip::category.categories') ) !!}

                                {!! Form::select('categories[]', $categories->pluck('title' , 'id')->toArray()  , $trip->categories->pluck('id')->toArray() , [ 'data-placeholder' => trans('trip::category.categories') , 'class' => 'form-control select2' , 'multiple' => "multiple" , 'style' => 'width:100%' ]) !!}
                            </div>


                           <div class="form-group">
                                {!! Form::label('right_side_boat_image' ,  trans('trip::trip.right_side_boat_image') ) !!}
                                {!! Form::file('right_side_boat_image' , ['id' => 'right_side_boat_image' , 'class' => 'form-control'] ) !!}
                            </div>

                            <img width="100px" height="100px" src="{{ asset($trip->right_side_boat_image) }}" class="img-responsive img-thumbnail">

                            <div class="form-group">
                                {!! Form::label('left_side_boat_image' ,  trans('trip::trip.left_side_boat_image') ) !!}
                                {!! Form::file('left_side_boat_image' , ['id' => 'left_side_boat_image' , 'class' => 'form-control'] ) !!}
                            </div>


                            <img width="100px" height="100px" src="{{ asset($trip->left_side_boat_image) }}" class="img-responsive img-thumbnail">



                           <div class="form-group">
                                {!! Form::label('der_license_image' ,  trans('trip::trip.der_license_image') ) !!}
                                {!! Form::file('der_license_image' , ['id' => 'der_license_image' , 'class' => 'form-control'] ) !!}
                            </div>

                            <img width="100px" height="100px" src="{{ asset($trip->der_license_image) }}" class="img-responsive img-thumbnail">


                            <div class="form-group">
                                {!! Form::label('boat_license_image' ,  trans('trip::trip.boat_license_image') ) !!}
                                {!! Form::file('boat_license_image' , ['id' => 'boat_license_image' , 'class' => 'form-control'] ) !!}
                            </div>

                            <img src="{{ asset($trip->boat_license_image) }}" width="100px" height="100px" class="img-responsive img-thumbnail">



                             <div class="form-group">
                                {!! Form::label('user_id' ,  trans('user::user.user') ) !!}
                                {!! Form::number('user_id' , $trip->user_id , ['placeholder' => trans('user::user.user') , 'id' => 'user_id' , 'class' => 'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('status' ,  trans('trip::trip.status')  ) !!}
                                <select name="status" class="form-control">
                                    <option {{ $trip->status == 'active' ? 'selected' : '' }} value="active">@lang('trip::trip.active')</option>
                                    <option {{ $trip->status == 'pending' ? 'selected' : '' }} value="pending">@lang('trip::trip.pending')</option>
                                </select>
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