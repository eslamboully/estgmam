@extends('adminpanel::layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            @lang('adminpanel::adminpanel.dashboard')
            <small>@lang('adminpanel::adminpanel.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> @lang('adminpanel::adminpanel.dashboard')</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $trips->count() }}</h3>

                        <p>@lang('trip::trip.trips')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-paypal"></i>
                    </div>
                    <a href="{{ route('trips.index') }}" class="small-box-footer">{{ __('adminpanel::adminpanel.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $photos->count() }}</h3>

                        <p>{{ __('photo::photo.photos') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('photos.index') }}" class="small-box-footer">{{ __('adminpanel::adminpanel.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $users->count() }}</h3>

                        <p>{{ __('user::user.users') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">{{ __('adminpanel::adminpanel.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $ads->count() }}</h3>

                        <p>{{ __('post::post.posts') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('posts.index') }}" class="small-box-footer">{{ __('adminpanel::adminpanel.more') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
{{--        <div class="row">--}}
{{--            <!-- Left col -->--}}
{{--            <section class="col-lg-7 connectedSortable">--}}
{{--                <!-- Custom tabs (Charts with tabs)-->--}}
{{--                <div class="nav-tabs-custom">--}}
{{--                    <!-- Tabs within a box -->--}}
{{--                    <ul class="nav nav-tabs pull-right">--}}
{{--                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>--}}
{{--                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>--}}
{{--                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>--}}
{{--                    </ul>--}}
{{--                    <div class="tab-content no-padding">--}}
{{--                        <!-- Morris chart - Sales -->--}}
{{--                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>--}}
{{--                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.nav-tabs-custom -->--}}


{{--                <!-- quick email widget -->--}}
{{--                <div class="box box-info">--}}
{{--                    <div class="box-header">--}}
{{--                        <i class="fa fa-envelope"></i>--}}

{{--                        <h3 class="box-title">Quick Email</h3>--}}
{{--                        <!-- tools box -->--}}
{{--                        <div class="pull-right box-tools">--}}
{{--                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"--}}
{{--                                    title="Remove">--}}
{{--                                <i class="fa fa-times"></i></button>--}}
{{--                        </div>--}}
{{--                        <!-- /. tools -->--}}
{{--                    </div>--}}
{{--                    <div class="box-body">--}}
{{--                        <form action="#" method="post">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="email" class="form-control" name="emailto" placeholder="Email to:">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" class="form-control" name="subject" placeholder="Subject">--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                  <textarea class="textarea" placeholder="Message"--}}
{{--                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="box-footer clearfix">--}}
{{--                        <button type="button" class="pull-right btn btn-default" id="sendEmail">Send--}}
{{--                            <i class="fa fa-arrow-circle-right"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </section>--}}
{{--            <!-- /.Left col -->--}}
{{--            <!-- right col (We are only adding the ID to make the widgets sortable)-->--}}
{{--            <section class="col-lg-5 connectedSortable">--}}

{{--                <!-- Map box -->--}}
{{--                <div class="box box-solid bg-light-blue-gradient">--}}
{{--                    <div class="box-header">--}}
{{--                        <!-- tools box -->--}}
{{--                        <div class="pull-right box-tools">--}}
{{--                            <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"--}}
{{--                                    title="Date range">--}}
{{--                                <i class="fa fa-calendar"></i></button>--}}
{{--                            <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"--}}
{{--                                    data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">--}}
{{--                                <i class="fa fa-minus"></i></button>--}}
{{--                        </div>--}}
{{--                        <!-- /. tools -->--}}

{{--                        <i class="fa fa-map-marker"></i>--}}

{{--                        <h3 class="box-title">--}}
{{--                            Visitors--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="box-body">--}}
{{--                        <div id="world-map" style="height: 250px; width: 100%;"></div>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-body-->--}}
{{--                    <div class="box-footer no-border">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">--}}
{{--                                <div id="sparkline-1"></div>--}}
{{--                                <div class="knob-label">Visitors</div>--}}
{{--                            </div>--}}
{{--                            <!-- ./col -->--}}
{{--                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">--}}
{{--                                <div id="sparkline-2"></div>--}}
{{--                                <div class="knob-label">Online</div>--}}
{{--                            </div>--}}
{{--                            <!-- ./col -->--}}
{{--                            <div class="col-xs-4 text-center">--}}
{{--                                <div id="sparkline-3"></div>--}}
{{--                                <div class="knob-label">Exists</div>--}}
{{--                            </div>--}}
{{--                            <!-- ./col -->--}}
{{--                        </div>--}}
{{--                        <!-- /.row -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.box -->--}}

{{--                <!-- solid sales graph -->--}}
{{--                <div class="box box-solid bg-teal-gradient">--}}
{{--                    <div class="box-header">--}}
{{--                        <i class="fa fa-th"></i>--}}

{{--                        <h3 class="box-title">Sales Graph</h3>--}}

{{--                        <div class="box-tools pull-right">--}}
{{--                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="box-body border-radius-none">--}}
{{--                        <div class="chart" id="line-chart" style="height: 250px;"></div>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-body -->--}}
{{--                    <div class="box-footer no-border">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">--}}
{{--                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"--}}
{{--                                       data-fgColor="#39CCCC">--}}

{{--                                <div class="knob-label">Mail-Orders</div>--}}
{{--                            </div>--}}
{{--                            <!-- ./col -->--}}
{{--                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">--}}
{{--                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"--}}
{{--                                       data-fgColor="#39CCCC">--}}

{{--                                <div class="knob-label">Online</div>--}}
{{--                            </div>--}}
{{--                            <!-- ./col -->--}}
{{--                            <div class="col-xs-4 text-center">--}}
{{--                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"--}}
{{--                                       data-fgColor="#39CCCC">--}}

{{--                                <div class="knob-label">In-Store</div>--}}
{{--                            </div>--}}
{{--                            <!-- ./col -->--}}
{{--                        </div>--}}
{{--                        <!-- /.row -->--}}
{{--                    </div>--}}
{{--                    <!-- /.box-footer -->--}}
{{--                </div>--}}
{{--                <!-- /.box -->--}}


{{--            </section>--}}
{{--            <!-- right col -->--}}
{{--        </div>--}}
        <!-- /.row (main row) -->

    </section>
@stop