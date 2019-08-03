<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset(admin()->image)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{admin()->full_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> @lang('adminpanel::adminpanel.online')</a>
            </div>
        </div>

        <!-- start search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="@lang('adminpanel::adminpanel.search')">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- end search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">@lang('adminpanel::adminpanel.main_navigation')</li>

            <li class=" {{ active('/') }} treeview">
                <a href="{{ url('/admin') }}">
                    <i class="fa fa-dashboard"></i> <span>@lang('adminpanel::adminpanel.dashboard')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> <span>@lang('adminpanel::adminpanel.dashboard')</span></a></li>
                </ul>
            </li>

            <li class=" {{ active('admins') }} treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i> <span>@lang('admin::admin.admins')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admins.index') }}"><i class="fa fa-user-secret"></i> @lang('admin::admin.admins')</a></li>
                    <li><a href="{{ route('admins.create') }}"><i class="fa fa-plus"></i> @lang('adminpanel::adminpanel.add')</a></li>
                </ul>
            </li>

            <li class=" {{ active('users') }} treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>@lang('user::user.users')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> @lang('user::user.users')</a></li>
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-plus"></i> @lang('adminpanel::adminpanel.add')</a></li>
                </ul>
            </li>

            <li class=" {{ active('videos') }} treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>@lang('video::video.videos')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('videos.index') }}"><i class="fa fa-user"></i> @lang('video::video.videos')</a></li>
                    <li><a href="{{ route('videos.create') }}"><i class="fa fa-plus"></i> @lang('adminpanel::adminpanel.add')</a></li>
                </ul>
            </li>

{{--            <li class=" {{ active('services') }} treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-users"></i> <span>@lang('service::service.services')</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--                        <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}

{{--                    <li class="active">--}}
{{--                        <a href="{{ route('service-categories.index') }}"><i class="fa fa-flag"></i>--}}
{{--                            @lang('service::category.categories')--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="active">--}}
{{--                        <a href="{{ route('services.index') }}"><i class="fa fa-users"></i>--}}
{{--                            @lang('service::service.services')--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <li class=" {{ active('trips') }} {{ active('trip-categories') }} treeview">
                <a href="#">
                    <i class="fa fa-plane"></i> <span>@lang('trip::trip.trips')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active">
                        <a href="{{ route('trip-categories.index') }}"><i class="fa fa-flag"></i>
                            @lang('trip::category.categories')
                        </a>
                    </li>


{{--                    <li class="active">--}}
{{--                        <a href="{{ route('destinations.index') }}"><i class="fa fa-globe-asia"></i>--}}
{{--                            @lang('trip::destination.destinations')--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="active">
                        <a href="{{ route('trips.index') }}"><i class="fa fa-plane"></i>
                            @lang('trip::trip.trips')
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" {{ active('posts') }} {{ active('plans') }} treeview">
                <a href="#">
                    <i class="fa fa-cc-paypal"></i> <span>@lang('post::post.posts')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active">
                        <a href="{{ route('plans.index') }}"><i class="fa fa-address-book-o"></i>
                            @lang('post::post.plans')
                        </a>
                    </li>

                    <li class="active">
                        <a href="{{ route('posts.index') }}"><i class="fa fa-paypal"></i>
                            @lang('post::post.posts')
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" {{ active('photos') }} treeview">
                <a href="#">
                    <i class="fa fa-photo"></i> <span>@lang('photo::photo.images')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active">
                        <a href="{{ route('photos.index') }}"><i class="fa fa-photo"></i>
                            @lang('photo::photo.images')
                        </a>
                    </li>


                    <li class="active">
                        <a href="{{ route('photos.create') }}"><i class="fa fa-plus"></i>
                            @lang('adminpanel::adminpanel.add')
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" {{ active('comments') }} treeview">
                <a href="#">
                    <i class="fa fa-comment"></i> <span>@lang('comment::comment.comments')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active">
                        <a href="{{ route('comments.index') }}"><i class="fa fa-comment"></i>
                            @lang('comment::comment.comments')
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" {{ active('configs') }} treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>@lang('config::config.configs')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active">
                        <a href="{{ route('configs.index') }}"><i class="fa fa-cog"></i>
                            @lang('config::config.configs')
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
