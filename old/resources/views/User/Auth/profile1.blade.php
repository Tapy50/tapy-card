<!DOCTYPE html>
<html @if( session()->get("lang") == 'ar') dir="rtl" @endif lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MyLink - Connect audiences to all of your content with just one link">
    <meta name="author" content="MrJim Development">
    <title><?php echo $data->name; ?> - Tapycard Profile</title>
    <!-- Favicon -->
    <link href="{{asset('assets/profile/img/tapy-black.png')}}" rel="icon" type="image/png">
    <!-- Icons -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/profile/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/profile/css/main.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://demo.rajodiya.com/vcardgo-saas/assets/css/plugins/bootstrap-switch-button.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    @if( session()->get("lang") == 'ar')
        <link rel="stylesheet" href="{{asset('assets/profile/css/ar_style.css')}}">

    @else
        <link rel="stylesheet" href="{{asset('assets/profile/css/style.css')}}">
    @endif
</head>

<body class="theme_body">

<div class="preloader" style="display:none">
    <div class="row" style="height:100%">
        <div class="logo-row">
            <div class="logopre">
                <img class="preloader-logo-icon logo-elem" src="{{asset('/assets/profile/img/tapy-black.png')}}" alt="Tapycard">
            </div>
        </div>
    </div>
</div>

<script>
    $( window ).on( "load", function() {
        document.querySelector(".preloader").style.display = "none";
        document.querySelector("body").style.overflow = "unset";
    });
</script>

<script>
    var timeee = '';
</script>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Tapycard</a>
        </div>
        <a href="https://tapycard.com/get_your_card" style="color:white !important;">{{__('lang.Get Your Card')}}</a>
    </div>
</nav>



<div class="modal fade appointment-modal" id="appointment-modal" style="background: #000000c4;" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="modal-custom-header d-flex align-items-center justify-content-between w-100">
                    <h4 class="modal-title">{{__('lang.Make Appointment')}}</h4>
                    <button type="button" class="back-btn d-flex align-items-center justify-content-center" onclick="dismiss_modal()" data-dismiss="modal">
                        <img src="https://demo.rajodiya.com/vcardgo-saas/custom/theme10/icon/close.svg" alt="back" class="img-fluid">
                    </button>
                    <!-- <button type="button" class="logout-btn"><img src="custom/theme10/icon/black/signout.svg" alt="signout" class="img-fluid"></button> -->
                </div>
            </div>
            <div class="modal-body px-4">


                <form class="appointment-formauth-login-form mt-2" method="POST" action="{{ url('make.appointment') }}">
                    @csrf
                    <input type="hidden" name="profile" value="{{$data->id}}">
                    <input type="hidden" name="user" value="{{$data->User->id}}">
                    <input type="hidden" name="username" value="{{$data->User->username}}">
                    <input type="hidden" id="timea" name="timea" value="">
                    <input type="hidden" id="timea_to" name="timea_to" value="">
                    <input type="hidden" id="datea" name="datea" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{__('lang.name')}}:</label>
                        <input type="text" name="namea" placeholder="Enter your name" class="form-control app_name" id="recipient-name">
                        <div class="">
                            <span class="text-danger  h5 span-error-name"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('lang.email')}}:</label>
                        <input type="email" name="emaila" placeholder="Enter your email" class="form-control app_email" id="recipient-name">
                        <div class="">
                            <span class="text-danger  h5 span-error-email"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('lang.email')}}:</label>
                        <input type="text" name="phonea" placeholder="Enter your phone no." class="form-control app_phone" id="recipient-name">
                        <div class="">
                            <span class="text-danger  h5 span-error-phone"></span>
                        </div>
                    </div>
                    <div class="form-btn-group">
                        <button type="button" class="btn form-btn--close" onclick="dismiss_modal()" data-dismiss="modal">{{__('lang.Close')}}</button>
                        <button class="btn form-btn--submit" type="submit" id="makeappointment">{{__('lang.Make Appointment')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<nav class="main-header navbar navbar-expand-lg navbar-dark hide">
    <a href="/" class="navbar-brand">
        <img src="{{asset('assets/profile/img/tapy-white.png')}}" alt="tapyLogo" style="height: 100%;">
    </a>
</nav>

<!-- Main content -->
<div class="main-content">

    <!-- Particles JS -->
    <!-- <div id="particles-js"></div> -->


    <!-- Page content -->

    <div class="container-fluid pb-5 pt-7">

        <!-- Blobs Background-->






        <div class="col-xl-4 mb-5 mx-auto" id="mainnn">
            <div class="card card-profile shadow" style=" border-radius: 20px; ">
                <div class="row justify-content-center">
                    <div class="banner-image">
                        <div class="banner-image-main">
                            <img src="{{$data->cover}}" id="banner_preview" alt="fs">
                        </div>
                        <div class="media align-items-center justify-content-center profile-head">
                            <div class="profile">
                                <img src="{{$data->image}}" id="business_logo_preview" alt="user" class="mb-4 img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">


                    </div>
                </div>
                <div class="card-header text-center border-0 ">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-sm btn-primary btn-rounded text-white" id="back_btn" onClick="showContent()"
                           style="display: none;">Back</a>
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4a mt-md-5a">
                    <div id="main_bio" class="text-center">
                        <h3 style="color:black !important;font-weight: 600;">
                            {{$data->first_name}} {{$data->last_name}}
                        </h3>
                        <h6 style="color:black !important;font-weight: 600;">
                            <?php echo $data->designation; ?>
                        </h6>
                        <div>
                            <?php echo $data->sub_title; ?>
                        </div>

                        <div class="mt-3 mb-4">

                            @foreach($data->ElementsSocial as $social)
                                @php



                                    $link = $social->value;

                                    if($social->sub_type == "instagram") $link = "https://www.instagram.com/".$social->value;
                                    if($social->sub_type == "twitter") $link = "https://www.twitter.com/".$social->value;
                                    if($social->sub_type == "snapchat") $link = "https://www.snapchat.com/add/".$social->value;
                                    if($social->sub_type == "tiktok") $link = "https://www.tiktok.com/".$social->value;
                                    if($social->sub_type == "whatsapp") $link = "http://api.whatsapp.com/send?phone=".$social->value;
                                @endphp
                                <a target="_blank" class="btn btn-circle btn-black" style=" padding-left: 12px; padding-top: 8px; " href="{{$link}}">
                                    <i class="fa-brands fa-{{$social->sub_type}}"></i>
                                </a>
                            @endforeach
                            <br>
                            @if($data->active_save_contact == 'active')
                                <a class="contact_btn btn btn-sm btn-success float-right text-white mt-3 con" style="background-color: #3d3d3d;border-color: #3d3d3d;" href="{{url('vcf',$data->id)}}">{{__('lang.Save Contact')}}</a>
                            @endif
                            @if($data->active_exchange_contact == 'active')
                                <a class="contact_btn btn btn-sm btn-warning float-right text-white mt-3 con" style="background-color: #3d3d3d;border-color: #3d3d3d;" onClick="showContact()">{{__('lang.Exchange Contact')}}</a>
                            @endif

                        </div>


                    </div>
                    <div id="content_section">
                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="gallery-tab" data-bs-toggle="pill" data-bs-target="#gallery" type="button"
                                        role="tab" aria-controls="gallery" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%;" aria-selected="true">{{__('lang.about')}}</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-songs-tab" data-bs-toggle="pill" data-bs-target="#pills-songs" type="button"
                                        role="tab" aria-controls="pills-songs" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%;" aria-selected="false">{{__('lang.Links')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-images-tab" data-bs-toggle="pill" data-bs-target="#pills-images" type="button"
                                        role="tab" aria-controls="pills-images" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%; " aria-selected="false">{{__('lang.Images')}}</button>
                            </li>
                            <br>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-videos-tab" data-bs-toggle="pill" data-bs-target="#pills-videos" type="button"
                                        role="tab" aria-controls="pills-videos" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%; " aria-selected="false">{{__('lang.Videos')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-contactInfo-tab" data-bs-toggle="pill" data-bs-target="#pills-contactInfo" type="button"
                                        role="tab" aria-controls="pills-contactInfo" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%;" aria-selected="false">{{__('lang.Contact info')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-appointment-tab" data-bs-toggle="pill" data-bs-target="#pills-appointment" type="button"
                                        role="tab" aria-controls="pills-appointment" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%;" aria-selected="false">{{__('lang.Appointment')}}</button>
                            </li>
                            {{--                            <li class="nav-item" role="presentation">--}}
                            {{--                                <button class="nav-link " id="pills-teams-tab" data-bs-toggle="pill" data-bs-target="#pills-teams" type="button"--}}
                            {{--                                        role="tab" aria-controls="pills-teams" style="background-color: white; border-color: white !important; color: #3d3d3d; box-shadow: 0px 0px 3px 0px #3d3d3d;  width: 90%; font-size: 1em !important;" aria-selected="false">{{__('lang.Team')}}--}}
                            {{--                                </button>--}}
                            {{--                            </li>--}}
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                <div class="d-flex flex-wrap justify-content-center align-items-start">

                                    <h3 style="margin-bottom: 1em;width: 100%; text-align: center;">{{__('lang.about')}}</h3>
                                    <p>
                                        {{$data->about}}
                                    </p>
                                    <hr class="my-4 mb-3">



                                    <div class="card-detail" id="business-hours-div">
                                        <div class="text-center card-business-hours">
                                            <div class="business-hours-image image-icon contact-icon">
                                                <img src="https://demo.rajodiya.com/vcardgo-saas/custom/theme1/icon/color1/clock.svg" alt="clock" class="img-fluid">
                                            </div>
                                            <h4>{{__('lang.Business Hours')}}</h4>
                                            <ul class="pl-5">
                                                <?php                                               $avaliable = [];
                                                ?>
                                                @foreach(\App\Models\BusinessHour::where('profile_id',$data->id)->where('is_active','active')->get() as $hours)
                                                    <?php
                                                    if($hours->day == 'sunday'){
                                                        array_push($avaliable , 0);
                                                    }elseif($hours->day == 'monday'){
                                                        array_push($avaliable , 1);
                                                    }elseif($hours->day == 'tuesday'){
                                                        array_push($avaliable , 2);
                                                    }elseif($hours->day == 'wednesday'){
                                                        array_push($avaliable , 3);
                                                    }elseif($hours->day == 'thursday'){
                                                        array_push($avaliable , 4);
                                                    }elseif($hours->day == 'thursday'){
                                                        array_push($avaliable , 5);
                                                    }elseif($hours->day == 'saturday'){
                                                        array_push($avaliable , 6);
                                                    }
                                                    ?>
                                                    <li><p>{{__('lang.'.$hours->day)}}:<span class="days_sun">
                                                            @if ($hours->is_active == 'active')
                                                                    <span class="days_sun_start">{{\Carbon\Carbon::parse($hours->start_time)->format('H:i')}} </span> - <span class="days_sun_end">{{Carbon\Carbon::parse($hours->end_time)->format('H:i')}}</span></span>
                                                            @else
                                                                {{__('lang.Closed')}}
                                                            @endif
                                                        </p></li>
                                                @endforeach

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-songs" role="tabpanel" aria-labelledby="pills-songs-tab">
                                <div class="container">
                                    <h3 style="margin-bottom: 1em;text-align: center;">{{__('lang.Links')}}</h3>

                                    <div class="profile-card-social pb-3">

                                        <?php
                                        $profile_elements =  $data->ElementsLinks;


                                        foreach($profile_elements as $profile_element) {

                                        if ($profile_element->sub_type == "facebook") {
                                            $element_type = "facebook";
                                        }else if ($profile_element->sub_type == "instagram") {
                                            $element_type = "instagram";
                                        }else if ($profile_element->sub_type == "twitter") {
                                            $element_type = "twitter";
                                        }else if ($profile_element->sub_type == "tiktok") {
                                            $element_type = "tiktok";
                                        }else if ($profile_element->sub_type == "whatsapp") {
                                            $element_type = "whatsapp";
                                        }else if ($profile_element->sub_type == "linked-in") {
                                            $element_type = "linkedin";
                                        }else if ($profile_element->sub_type == "pinterest") {
                                            $element_type = "pinterest";
                                        }else if ($profile_element->sub_type == "snapchat") {
                                            $element_type = "snapchat";
                                        }else if ($profile_element->sub_type == "youtube") {
                                            $element_type = "youtube";
                                        }else if ($profile_element->sub_type == "codepen") {
                                            $element_type = "codepen";
                                        }else if ($profile_element->sub_type == "github") {
                                            $element_type = "github";
                                        }else if ($profile_element->sub_type == "custom_link") {
                                            $element_type = "custom";
                                        }
                                        ?>
                                        <a class="profile-card-social__item text-white btn-<?php echo $element_type; ?>" href="<?php echo $profile_element->value; ?>" target="_blank">
                                            <i class="<?php if($element_type == "custom") echo "fas"; else echo "fab";  ?> fa-<?php if($element_type == "custom") echo "link"; else echo $element_type."-square";  ?> icon"></i> <?php echo $profile_element->value2; ?>
                                        </a>
                                        <?php
                                        }
                                        ?>


                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-images" role="tabpanel" aria-labelledby="pills-images-tab">

                                <div class="d-flex flex-wrap justify-content-center align-items-start">

                                    <div class="slideshow-container">

                                        <script>
                                            jQuery(document).ready(function ($) {
                                                var options = { $AutoPlay: 1 };
                                                var jssor1_slider = new $JssorSlider$("jssor_1", options);
                                            });

                                        </script>
                                        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:450px;height:480px;overflow:hidden;visibility:hidden;">
                                            <!-- Loading Screen -->
                                            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="//jssors8.azureedge.net/theme/svg/loading/static-svg/spin.svg" />
                                            </div>
                                            <div data-u="slides" id="slidess" style="cursor:default;position:relative;top:0px;left:0px;width:450px;height:380px;overflow:hidden;">

                                                <?php
                                                $profile_elements = $data->ElementsImage;

                                                $i = 0;
                                                foreach($profile_elements as $profile_element) {
                                                $i++;

                                                ?>

                                                <div>
                                                    <img data-u="image" src="{{$profile_element->value}}" />
                                                    <img data-u="thumb" src="{{$profile_element->value}}" />
                                                </div>


                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">web animation</a>
                                            <!-- Thumbnail Navigator -->
                                            <div data-u="thumbnavigator" id="thumbzzz" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:450px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
                                                <div data-u="slides">
                                                    <div data-u="prototype" class="p" style="width:190px;height:90px;">
                                                        <div data-u="thumbnailtemplate" class="t"></div>
                                                        <svg viewbox="0 0 16000 16000" class="cv">
                                                            <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                                            <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                                            <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Arrow Navigator -->
                                            <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;    position: absolute;" data-scale="0.75">
                                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                                    <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                                                    <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                                                </svg>
                                            </div>
                                            <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;    position: absolute;" data-scale="0.75">
                                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                                    <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                                    <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- a class="prev" onclick="plusSlides(-1)">❮</a>
                                        <a class="next" onclick="plusSlides(1)">❯</a-->

                                    </div>
                                    <br>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">

                                <div class="d-flex flex-wrap justify-content-center align-items-start">
                                    @foreach($data->ElementsVideo as $video)
                                        @if($video->sub_type == 'youtube')

                                            <h3 style="margin-bottom: 1em;width: 100%; text-align: center;">{{$video->title}}</h3>
                                            <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{ Str::after($video->value,'https://youtu.be/') }}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <hr>
                                        @else
                                            <h3 style="margin-bottom: 1em;width: 100%; text-align: center;">{{$video->title}}</h3>
                                            <iframe width="100%" height="300" src="{{$video->value}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <hr>
                                        @endif
                                    @endforeach

                                </div>
                            </div>


                            <div class="tab-pane fade" id="pills-contactInfo" role="tabpanel" aria-labelledby="pills-contactInfo-tab">
                                <h3 style="margin-bottom: 1em;">{{__('lang.Contact info')}}</h3>
                                <div class="chakra-stack css-189lrbm cont-container">
                                    @foreach($data->ElementsContact as $profile_element )
                                        <?php


                                        $contact_href = "";
                                        $element_type = "";

                                        if ($profile_element->sub_type == "website") {
                                            $element_type = '<i class="fa-solid fa-link" style="color: black !important"></i>';
                                            $contact_href = $profile_element->value;
                                            $contact_title = $profile_element->value2;
                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                        }else if ($profile_element->sub_type == "email") {
                                            $element_type = '<i class="fa-solid fa-envelope" style="color: black !important"></i>';
                                            $contact_href = "mailto:".$profile_element->value;
                                            $contact_title = $profile_element->value2;
                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                        }else if ($profile_element->sub_type == "phone") {
                                            $element_type = '<i class="fa-solid fa-phone" style="color: black !important"></i>';
                                            $contact_href = "tel:".$profile_element->value;
                                            $contact_title = $profile_element->value2;
                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                        }else if ($profile_element->sub_type == "address") {
                                            $element_type = '<i class="fa-solid fa-location-dot" style="color: black !important"></i>';
                                            $contact_href = 'https://maps.google.com/?q='.$profile_element->value;
                                            $contact_title = __('lang.Click to open on map');
                                        }


                                        ?>
                                        <div class="css-hboir5">
                                            <div class="css-1if8zqo">
                                                <?php echo $element_type; ?>
                                            </div>
                                            <a target="_self" href="<?php echo $contact_href; ?>" class="css-hd481m">
                                                <span class="chakra-text css-f3dzr7"><?php echo $contact_title; ?></span>
                                                <div class="css-zdpt2t">

                                                </div>
                                            </a>
                                        </div>

                                    @endforeach








                                </div>

                            </div>

                            <div class="tab-pane fade" id="pills-appointment" role="tabpanel" aria-labelledby="pills-appointment-tab">

                                <h3 style="margin-bottom: 1em; margin-top: 2em;">{{__('lang.Make Appointment')}}</h3>

                                <div class="card-contact pt-3">
                                    <div class="">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-center">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-center card-business-hours">
                                        <form  method="post" action="{{url('Appointment-store')}}" class="datepicker-form">
                                            @csrf
                                            <input type="hidden" name="profile_id" value="{{$data->id}}">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.name')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text"  required name="name" class="form-control " placeholder="{{__('lang.name')}}">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.phone')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="tel"  name="phone" required class="form-control " placeholder="{{__('lang.phone')}}">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.email')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="email" required  name="email" class="form-control " placeholder="{{__('lang.email')}}">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.date')}}</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" required  class="form-control datepicker" placeholder="Pick a Date" name="date">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.start_time')}}</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time"   required class="form-control " placeholder="Pick a Date" name="start_time">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.end_time')}}</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time"  required class="form-control " name="end_time">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="">{{__('lang.note')}}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea  rows="3"    class="form-control " ></textarea>
                                                </div>
                                            </div>

                                            <div class="make-an-appointment d-flex w-100">
                                                <div class="lable-custom"></div>
                                                <div class="make-an-appointment-btn w-100">
                                                    <button type="submit"  class="make-an-appointment-btn-main d-flex align-items-center justify-content-center w-100">
                                                        <img src="https://demo.rajodiya.com/vcardgo-saas/custom/theme10/icon/calender-black.png" alt="calender-black" class="img-fluid">
                                                        <h4 class="text-white">{{__('lang.Make Appointment')}}</h4>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>


                        </div>



                    </div>

                    <script>
                        function setdatetime(){

                            dateee = document.getElementById("input_from").value;
                            document.getElementById("appointment-modal").style.display = "block";



                            document.getElementById("datea").value = dateee;
                            document.getElementById("timea").value = timeee;
                            document.getElementById("timea_to").value = timeee_to;


                            /*console.log("Date: "+dateee);
                            console.log("Time: "+timeee);*/
                        }

                        function dismiss_modal(){
                            document.getElementById("appointment-modal").style.display = "none";
                        }

                            <?php
                            $appointments = $data->AppointmentsRelation;
                            ?>

                        var appointments = <?php echo json_encode($appointments); ?>;

                        function datechange(){

                            dateee = document.getElementById("input_from").value;
                            //console.log("Date: "+dateee);

                            var selected_date = new Date(dateee);

                            var year = selected_date.toLocaleString("default", { year: "numeric" });
                            var month = selected_date.toLocaleString("default", { month: "2-digit" });
                            var day = selected_date.toLocaleString("default", { day: "2-digit" });

                            // Generate yyyy-mm-dd date string
                            selected_date = day + "-" + month + "-" + year;


                            var selected_dateeee = Date.parse(new Date(dateee));
                            var now =  Date.parse(new Date());


                            if (selected_dateeee < now) {

                                var elements = document.getElementsByClassName('app_timee');

                                for (var i=0; i<elements.length; i++) {
                                    elements[i].disabled = true;
                                    /*console.log(elements[i].outerHTML);
                                    console.log("disabled: "+i);*/
                                }


                                var elements2 = document.getElementsByClassName('app_timeea');

                                for (var i=0; i<elements2.length; i++) {
                                    elements2[i].classList.add("l-disabled");
                                    /*console.log(elements2[i].outerHTML);
                                    console.log("disabledd: "+i);*/
                                }

                                /*appointments.forEach(dateloopa);

                                function dateloopa(item, index) {


                                    document.getElementById("radio-"+item.time).disabled = true;
                                    document.getElementById("radioo-"+item.time).classList.add("l-disabled");

                                    console.log("disabled loop: "+item.time);

                                }*/

                            }else{

                                var elements = document.getElementsByClassName('app_timee');

                                for (var i=0; i<elements.length; i++) {
                                    elements[i].disabled = false;
                                }


                                var elements2 = document.getElementsByClassName('app_timeea');

                                for (var i=0; i<elements2.length; i++) {
                                    elements2[i].classList.remove("l-disabled");
                                }

                            }



                            appointments.forEach(dateloop);
                            var current_datee = '';

                            function dateloop(item, index) {


                                /*document.getElementById("radio-"+item.time).disabled = false;
                                document.getElementById("radioo-"+item.time).classList.remove("l-disabled");*/



                                current_datee = new Date(item.date);

                                var year = current_datee.toLocaleString("default", { year: "numeric" });
                                var month = current_datee.toLocaleString("default", { month: "2-digit" });
                                var day = current_datee.toLocaleString("default", { day: "2-digit" });

                                // Generate yyyy-mm-dd date string
                                current_datee = day + "-" + month + "-" + year;

                                //console.log(current_datee + " - " + selected_date);

                                if (current_datee == selected_date) {

                                    document.getElementById("radio-"+item.time).disabled = true;
                                    document.getElementById("radioo-"+item.time).classList.add("l-disabled");

                                    /*console.log(current_datee + " = " + selected_date);
                                    console.log(item.time + " is already set");
                                    console.log("--------------------------");*/

                                }

                            }










                            /*var year = da.toLocaleString("default", { year: "numeric" });
                            var month = da.toLocaleString("default", { month: "2-digit" });
                            var day = da.toLocaleString("default", { day: "2-digit" });

                            // Generate yyyy-mm-dd date string
                            var formattedDate = day + "-" + month + "-" + year;
                            console.log(formattedDate);  // Prints: 04-05-2022
                            */


                            //console.log(appointments);
                        }


                    </script>



                    <div class="contact-section" id="contact_section">
                        <h4 class="text-center">Contact </h4>
                        <div class="text-center  mb-4">
                            <p>Fill out the form and You’ll receive Yousef's contact to above email.</p>
                        </div>
                        <form class="auth-login-form mt-2" method="POST" action="{{ url('ExchangeContact-store') }}">
                            @csrf
                            <input type="hidden" name="profile_id" value="<?php echo $data->id; ?>">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">

                                    <input class="form-control form-controla" placeholder="Name" name="name" type="text">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">

                                    <input class="form-control form-controla" placeholder="Email" name="email" type="email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span><br>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <input class="form-control form-controla" placeholder="Phone number" name="phone" type="text">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span><br>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-warning text-white btn-rounded">Exchange Contact</button>
                            </div>
                        </form>
                    </div>

                </div>

                <hr class="my-4 mb-3" />

                <p class="profile-declaration">tapy, LLC. <br>Listed company names are trademarks <sup>™</sup> or registered <sup>®</sup>
                    <br>trademarks of their respective holders. Use of them does not <br>imply any affiliation with or endorsement by them.
                </p>
                <a class="tapy-upsell show" target="__blank" href="{{url('login')}}">{{__('lang.Login')}}</a>

            </div>
        </div>


    </div>
</div>





<!-- JS Script -->
<!-- <script src="/assets/profile/js/particles.min.js"></script> -->

<!-- Lightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.0/dist/index.bundle.min.js"></script>
<script src="/assets/profile/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js"></script>
<script src="https://demo.rajodiya.com/vcardgo-saas/custom/js/jquery.qrcode.js"></script>
<script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
<script src="https://demo.rajodiya.com/vcardgo-saas/custom/js/emojionearea.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

    <?php
    $disabled= [];
    $days = [0,1,2,3,4,5,6];
    foreach($days as $day){
        if(!in_array( $day,$avaliable)){
            array_push($disabled ,$day);
        }
    }

    ?>
    $('.datepicker').datepicker({
        daysOfWeekDisabled: {{json_encode($disabled)}},
    });
</script>
<script>
    let ispassword;
    var ispassenable = '';

    var business_password = '';
    if(ispassenable == 'on'){
        $('.password-submit').click(function(){
            ispassword = 'true';
            passwordpopup('true');
        });
        function passwordpopup(type){


            if(type == 'false'){
                $('#passwordmodel').modal('show');
                $('html').addClass('modal-open');
                $('#passwordmodel').modal({
                    backdrop: 'static',
                    keyboard: false
                })
            }else{
                var password_val = $('.password_val').val();
                if(password_val == business_password){
                    $('#passwordmodel').modal('hide');
                    $('html').removeClass('modal-open');
                }else{
                    $(`.span-error-password`).text("*Please enter correct password");
                    passwordpopup('false');

                }



            }
        }
        if(ispassword == undefined){
            passwordpopup('false');
        }

    }
    $( document ).ready(function() {
        $(".emojiarea").emojioneArea();
        $(`.span-error-date`).text("");
        $(`.span-error-time`).text("");
        $(`.span-error-name`).text("");
        $(`.span-error-email`).text("");
        var slug = 'james-donald';
        var url_link = `https://demo.rajodiya.com/vcardgo-saas/${slug}`;
        $(`.qr-link`).text(url_link);
        $('.qrcode').qrcode({width: 180,height: 180,text: url_link});
    });
    $(`.rating_preview`).attr('id');
    var from_$input = $('#input_from').pickadate(),
        from_picker = from_$input.pickadate('picker')

    var to_$input = $('#input_to').pickadate(),
        to_picker = to_$input.pickadate('picker')

    var is_enabled = "1";
    if(is_enabled){
        $('.business-hours-div').show();
    }else{
        $('.business-hours-div').hide();
    }

    var is_enable_appoinment = "1";
    if(is_enable_appoinment){
        $('#appointment-div').show();
    }else{
        $('#appointment-div').hide();
    }

    var is_enable_service = "1";
    if(is_enable_service){
        $('#services-div').show();
    }else{
        $('#services-div').hide();
    }
    var is_enable_testimonials = "1";
    if(is_enable_testimonials){
        $('#testimonials-div').show();
    }else{
        $('#testimonials-div').hide();
    }
    var is_enable_sociallinks = "1";
    if(is_enable_sociallinks){
        $('.social-div').show();
    }else{
        $('.social-div').hide();
    }

    var is_custom_html_enable = "1";
    if(is_custom_html_enable){
        $('.custom_html_text').show();
    }else{
        $('.custom_html_text').hide();
    }

    var is_empty_description = "1";
    if(is_empty_description){
        $('.description-div').show();
    }else{
        $('.description-div').hide();
    }
    var is_branding_enable = "1";
    if(is_branding_enable){
        $('.branding_text').show();
    }else{
        $('.branding_text').hide();
    }


</script>

<script>

    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('nav').addClass('shrink');
        } else {
            $('nav').removeClass('shrink');
        }
    });

    /*
    var audio = new Audio();
    function play(no) {
      audio.pause();
      audio = new Audio($('[data-track-number='+no+']').attr('src'));
      audio.play();
    }

    $('[data-play-track]').on('click', function () {
      var track_no  = $(this).attr('data-play-track');

      var btn = $(this).parents('.playlist-item').find('.btn-playlist').html();

      if (btn == '<i class="fas fa-play"></i>') {
        $('.btn-playlist').html('<i class="fas fa-play"></i>');
        $(this).parents('.playlist-item').find('.btn-playlist').html('<i class="fas fa-pause"></i>');
        play(track_no);
      } else {
        audio.pause();
        $(this).parents('.playlist-item').find('.btn-playlist').html('<i class="fas fa-play"></i>');

      }

    })
    */
</script>


<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

<script src="//jssors8.azureedge.net/script/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    window.jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
            {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $SpacingX: 5,
                $SpacingY: 5
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<script type="text/javascript">jssor_1_slider_init();
</script>
<!-- #endregion Jssor Slider End -->

<script src="//jssors8.azureedge.net/script/site/jssor.user.commands.init-1.30.0.min.js"></script>
<script src="https://demo.rajodiya.com/vcardgo-saas/assets/js/plugins/bootstrap.min.js"></script>
<script src="https://demo.rajodiya.com/vcardgo-saas/custom/libs/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="https://demo.rajodiya.com/vcardgo-saas/assets/js/plugins/bootstrap-switch-button.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php
    $message = session()->get("message");
    ?>
    @if( session()->has("message"))

    Swal.fire({
        icon: 'success',
        title: '{{__('lang.Success')}}',
        text: '{{__('lang.Success_text')}}!',
    })

    @endif
</script>

</body>

</html>
