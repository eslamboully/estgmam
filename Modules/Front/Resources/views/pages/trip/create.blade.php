<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="AminulHchy">
        <title>@lang('front::front.estgmam') | @lang('front::front.create_trip')</title>
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ url('/') }}/assets3/img/shipp.png" type="image/x-icon" />
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/animate.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/iconfont/icofont.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/meanmenu.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/all.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/timecircles.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/typography/typography.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/color/default.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/main.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/widgets.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets3/css/responsive.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <style media="screen">
            .collapsible {
                background-color: #777;
                color: white;
                cursor: pointer;
                padding: 18px;
                width: 100%;
                border: none;
                text-align: right;
                outline: none;
                font-size: 15px;
            }
            .active, .collapsible:hover {
                background-color: #555;
            }
            .content {
                padding: 0 18px;
                display: none;
                overflow: hidden;
                background-color: #f9f9f9;
            }
            .font-good {
                font-family: 'Cairo', sans-serif;
            }
            body {
                background: #fff;
            }
        </style>
    </head>
    <body>

           @if(request()->has('cat_id'))
               @foreach($sub_cats as $cat)
                   @if(request()->cat_id == $cat->id)
                       <section class="contact-page pb-120 font-good">
                           <div class="container">
                               <div class="row">
                                   <div class="col-lg-12 col-lg-4 mb-5 mb-lg-0">
                                       <div class="contact-form">
                                           <h3 class="font-good">@lang('front::front.add_post')</h3>
                                           @if ($errors->any())
                                               <div class="alert alert-danger">
                                                   <ul>
                                                       @foreach ($errors->all() as $error)
                                                           <li>{{ $error }}</li>
                                                       @endforeach
                                                   </ul>
                                               </div>
                                           @endif
                                           <form class="submit_form" method="post" action="{{ route('store_trips') }}" enctype="multipart/form-data">
                                               @csrf
                                                <span class="input">
                                                    <input class="input__field" name="boat_number" value="{{ old('boat_number') }}" type="text" id="input-01">
                                                    <label class="input__label" for="input-01">
                                                        <span class="input__label-content">@lang('front::front.vehicle_number')</span>
                                                    </label>
                                                </span>
                                                <span class="input">
                                                    <input class="input__field" name="boat_title" value="{{ old('boat_title') }}" type="text" id="input-02">
                                                    <label class="input__label" for="input-02">
                                                        <span class="input__label-content">@lang('front::front.vehicle_name')</span>
                                                    </label>
                                                </span>
                                                <span class="input">
                                                    <input class="input__field" name="passengers" value="{{ old('passengers') }}" type="text" id="input-03">
                                                    <label class="input__label" for="input-03">
                                                        <span class="input__label-content">@lang('front::front.people_number')</span>
                                                    </label>
                                                </span>
                                               <input class="hidden" hidden name="categories" value="{{ request()->cat_id }}">
                                                <span class="input">
                                                    <input class="input__field" name="berth" value="{{ old('berth') }}" type="text" id="input-04">
                                                    <label class="input__label" for="input-04">
                                                        <span class="input__label-content">@lang('front::front.marsa')</span>
                                                    </label>
                                                </span>
                                                <span class="input">
                                                    <input class="input__field" name="passenger_price" value="{{ old('passenger_price') }}" type="text" id="input-05">
                                                    <label class="input__label" for="input-05">
                                                        <span class="input__label-content">@lang('front::front.one_price')</span>
                                                    </label>
                                                </span>
                                                <span class="input">
                                                    <input class="input__field" name="price" value="{{ old('price') }}" type="text" id="input-06">
                                                    <label class="input__label" for="input-06">
                                                        <span class="input__label-content">@lang('front::front.trip_price')</span>
                                                    </label>
                                                </span>
                                                                   <span class="input">
                                                    <input class="input__field" name="date" value="{{ old('date') }}" type="date" id="input-07">
                                                    <label class="input__label" for="input-07">
                                                        <span class="input__label-content">@lang('front::front.date')</span>
                                                    </label>
                                                </span>
                                                <span class="input">
                                                    <input class="input__field" name="day" value="{{ old('day') }}" type="text" id="input-08">
                                                    <label class="input__label" for="input-08">
                                                        <span class="input__label-content">@lang('front::front.trip_day')</span>
                                                    </label>
                                                </span>
                                               <span class="input">
                                                    <input class="input__field" name="trip_hour" value="{{ old('trip_hour') }}" type="text" id="input-09">
                                                    <label class="input__label" for="input-09">
                                                        <span class="input__label-content">@lang('front::front.trip_hour')</span>
                                                    </label>
                                                </span>
                                               <span class="input">
                                                    <input class="input__field" name="hour" value="{{ old('hour') }}" type="text" id="input-010">
                                                    <label class="input__label" for="input-010">
                                                        <span class="input__label-content">@lang('front::front.hour')</span>
                                                    </label>
                                                </span>

                                                <span style="width:100%" class="input message">
                                                    <input class="input__field" name="desc" value="{{ old('desc') }}" type="text" id="input-011">
                                                    <label class="input__label" for="input-011">
                                                        <span class="input__label-content">@lang('front::front.desc')</span>
                                                    </label>
                                                </span>
                                               <br/>
                                               <!-- start photos section -->
                                                       <label for="file" class="input-lable">
                                                           <i class="fa fa-image"></i>
                                                           @lang('front::front.add_licence_der')
                                                       </label>
                                                       <input id="file" name="der_license_image" type="file" multiple="true" />

                                                       <label for="file" class="input-lable">
                                                           <i class="fa fa-image"></i>
                                                           @lang('front::front.add_licence_car')
                                                       </label>
                                                       <input id="file" name="boat_license_image" type="file" multiple="true" />

                                                       <label for="file" class="input-lable">
                                                           <i class="fa fa-image"></i>
                                                           @lang('front::front.add_right_side_photo')
                                                       </label>
                                                       <input id="file" name="right_side_boat_image" type="file" multiple="true" />

                                                       <label for="file" class="input-lable">
                                                           <i class="fa fa-image"></i>
                                                           @lang('front::front.add_right_side_photo')
                                                       </label>
                                                       <input id="file" name="left_side_boat_image" type="file" multiple="true" />
                                               <!-- end photos section -->
                                                   <button type="button" class="boxed-btn font-good submit_btn">@lang('front::front.add_post')<i class="icofont-bubble-right"></i></button>

                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </section>
                   @endif
               @endforeach
           @else
               <div class="Select_a_category">
                   <div class="container">
                       <h3 class="font-good">@lang('front::front.choose_cat')</h3>
                       <p class="font-good">@lang('front::front.choose_message')</p>
                       @foreach($parent_cats as $cat)
                           <button class="collapsible font-good"><i style="float:left" class="fa fa-caret-down"></i>{{ $cat->title }}</button>
                           <div class="content">
                               <ul>
                                   @foreach($cat->child as $sub_cat)
                                       <li {{ request()->cat_id == $sub_cat->id ? 'selected' : '' }}><a href="{{ '?cat_id='.$sub_cat->id }}">
                                               <i style="color: #28a745;font-size: 17px;" class="fa fa-fingerprint"></i>
                                               {{ $sub_cat->title }}</a>
                                       </li>
                                   @endforeach
                               </ul>
                           </div>
                       @endforeach
                   </div>
               </div>
               <script>
                   var coll = document.getElementsByClassName("collapsible");
                   var i;

                   for (i = 0; i < coll.length; i++) {
                       coll[i].addEventListener("click", function() {
                           this.classList.toggle("active");
                           var content = this.nextElementSibling;
                           if (content.style.display === "block") {
                               content.style.display = "none";
                           } else {
                               content.style.display = "block";
                           }
                       });
                   }
               </script>
           @endif

        <script src="{{ url('/') }}/assets3/js/jquery.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.easing.js"></script>
        <script src="{{ url('/') }}/assets3/js/popper.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/owl.carousel.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.sticky.js"></script>
        <script src="{{ url('/') }}/assets3/js/wow.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.counterup.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.meanmenu.min.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.hoverdir.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.shuffle.min.js"></script>

        <!-- <script src="{{ url('/') }}/assets3/js/particles.js"></script> -->
        <script src="{{ url('/') }}/assets3/js/contactform.js"></script>

        <script src="{{ url('/') }}/assets3/js/timecircles.js"></script>
        <script src="{{ url('/') }}/assets3/js/jquery.downcount.js"></script>

        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqoWGSQYygV-G1P5tVrj-dM2rVHR5wOGY"></script>
        <script src="{{ url('/') }}/assets3/js/map-script.js"></script> -->

        <script src="{{ url('/') }}/assets3/js/custom.js"></script>
        <script>
            $('.submit_btn').on('click',function () {
                $('.submit_form').submit();
            });
        </script>
    </body>
</html>
