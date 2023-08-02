<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="html5,css3,bootstrap5,JavaScript,jquery">
    <meta name="author" content="tapy">
    <meta name="description" content="MyLink - Connect audiences to all of your content with just one link">
    <link rel="icon" href="{{asset('Profile/images/navbar/tapy-black.png')}}">
    <link rel="stylesheet" href="{{asset('Profile/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Profile/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />
    <link rel="stylesheet" href="{{asset('Profile/css/vanilla-calendar.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Profile/fonts/BRITANIC.ttf')}}">
    <link rel="stylesheet" href="{{asset('Profile/css/main.css')}}">
    <link href="{{asset('Profile/dist/css/lightbox.css')}}" rel="stylesheet" />

    <title>Tapycard Profile</title>
    <style>
        @if(session()->get('lang') == 'ar')
        .about-content-body p {
            text-align: right!important;
        }
        @endif
    </style>
</head>
<body>
<!-- start home -->
<section id="home">
    <div class="container py-5 px-0">
        <div class="content">
            <!-- begin of:: navbar  -->
            <div class="navbar">
                <img src="{{asset('Profile/images/navbar/tapy-light.png')}}" alt="Tapy">
                <a href="https://tapycard.com/store">{{__('lang.Get Your Card')}}</a>
            </div>
            <!-- end of:: navbar  -->
            <!-- begin of:: header  -->
            <header>
                <img src="{{asset('Profile/images/header/under-bg.png')}}" class="under-bg" alt="under-bg">
                <img src="{{$data->cover}}" class="header-bg" alt="header background" style="max-height: 100%">
                <img src="{{asset('Profile/images/header/border-line.png')}}" class="border-line" alt="border-line">
                <img src="{{$data->image}}" class="profile-image" alt="profile img">
                <img src="{{asset('Profile/images/header/under-profile-image.png')}}" class="under-profile-image" alt="profile image bg">
            </header>
            <!-- end of:: header  -->
            <!-- begin of:: user-info  -->
            <div class="user-info text-center">
                @if($data->User->type == 'company')
                    <h4>   {{$data->company}}
                    </h4>
                @else
                    <h4>   {{$data->first_name}} {{$data->last_name}}
                    </h4>
                    @endif

                <p>{{$data->title}}</p>
                <span>{{$data->sub_title}}</span>
                <ul>
                    @foreach($data->ElementsSocial as $social)
                        @php
                            $link = $social->value;
                            if($social->sub_type == "instagram") $link = "https://www.instagram.com/".$social->value;
                            if($social->sub_type == "twitter") $link = "https://www.twitter.com/".$social->value;
                            if($social->sub_type == "snapchat") $link = "https://www.snapchat.com/add/".$social->value;
                            if($social->sub_type == "tiktok") $link = "https://www.tiktok.com/".$social->value;
                            if($social->sub_type == "whatsapp") $link = "http://api.whatsapp.com/send?phone=".$social->value;
                        @endphp
                    <li><a href="{{$link}}"><span><i class="fa-brands fa-{{$social->sub_type}}"></i></span></a></li>
                    @endforeach
                </ul>
            </div>
            <!-- end of:: user-info  -->
            <!-- begin of:: user-details  -->
            <div class="user-details text-center py-2 pb-5">
                <div class="head ">
                    <div class="row px-3 d-flex justify-content-center align-items-center">
                        @if($data->active_save_contact == 'active')
                        <a href="{{url('vcf',$data->id)}}">{{__('lang.Save Contact')}}</a>
                        @endif
                        @if($data->active_exchange_contact == 'active')
                            <a class="hover" id="exchange-contact">{{__('lang.Exchange Contact')}}</a>
                        @endif
                    </div>
                </div>
                <div class="contact-container" id="contact-container">
                    <div class="row px-3 d-flex justify-content-end align-items-center text-end">
                        <a class="back-btn" id="backBtn">{{__('lang.back')}}</a>
                    </div>
                    <h3 class="title"> {{__('lang.Contact')}}
                        <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                        <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                    </h3>
                    <div class="row w-100 p-0 m-0 py-2">
                        <p>
                            @if( session()->get("lang") == 'ar') املأ النموذج ببيانات الاتصال ذات الصلة  @else Fill Out The Form With The Relevant Contact Details @endif.

                            .</p>
                    </div>
                    <div class="contact-form-container">
                        <form  method="POST" action="{{ url('ExchangeContact-store') }}">
                            @csrf
                            <div class="row m-0 px-3">
                                <div class="col-12 p-2">
                                    <input type="hidden" name="profile_id" value="<?php echo $data->id; ?>">
                                    <input class="form-control text-inputs" placeholder="{{__('lang.name')}}" name="name" type="text">
                                </div>
                                <div class="col-12 p-2">
                                    <input class="form-control text-inputs" placeholder="{{__('lang.email')}}" name="email" type="email">
                                </div>
                                <div class="col-12 p-2">
                                    <input class="form-control text-inputs" placeholder="{{__('lang.phone')}}" name="phone" type="text">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn" id="submitContactBtn">Exchange Contact</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="parent-container" id="parent-container">
                    <div class="nav-tabs">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="pill" data-bs-target="#pills-about"
                                        type="button" role="tab" aria-controls="pills-contact" aria-selected="true">{{__('lang.about')}}</button>
                            </li>
                            @if(count($data->ElementsLinks)>0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="links-tab" data-bs-toggle="pill" data-bs-target="#pills-links"
                                        type="button" role="tab" aria-controls="pills-work" aria-selected="false">{{__('lang.Links')}}</button>
                            </li>
                            @endif
                            @if(count($data->ElementsContact)>0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-info-tab" data-bs-toggle="pill" data-bs-target="#pills-contact-info"
                                        type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Contact info')}}</button>
                            </li>
                            @endif
                            @if(count($data->ElementsImage)>0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="pill" data-bs-target="#pills-images"
                                        type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Images')}}</button>
                            </li>
                            @endif
                            @if(count($data->ElementsVideo)>0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="videos-tab" data-bs-toggle="pill" data-bs-target="#pills-videos"
                                        type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Videos')}}</button>
                            </li>
                            @endif
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="appointment-tab" data-bs-toggle="pill" data-bs-target="#pills-appointment"
                                        type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Appointment')}}</button>
                            </li>
                            @if(count($data->Payments)>0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment"
                                        type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Payments')}}</button>
                            </li>
                            @endif
                            @if($data->User->type == 'company')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="teams-tab" data-bs-toggle="pill" data-bs-target="#pills-teams"
                                        type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Teams')}}</button>
                            </li>
                                @endif

                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active about-content p-2" id="pills-about" role="tabpanel" aria-labelledby="about-tab">
                            <h3 class="title"> {{__('lang.about')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            <div class="about-content-body">
                                <div class="row d-flex flex-wrap justify-content-center align-items-start text-start p-3 my-3">
                                    <p>
                                        {!! $data->about !!}
                                    </p>
                                </div>
                            </div>
                            <div class="business-hours text-center py-3 pt-4">
                                <img src="{{asset('Profile/images/about/bussines-hours.png')}}" alt="business-hours">
                                <div class="row d-flex m-0 py-4">
                                    <?php
                                    $avaliable = [];
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
                                        @endforeach

                                        @inject('BusinessHour','App\Models\BusinessHour')
                                        <div class="calender">
                                            <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                            <div class="calender-details">
                                                <div class="date">
                                                    <p>SAT</p>
                                                    <div class="small-line">
                                                    </div>
                                                </div>
                                                @php
                                                    $SAT =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','saturday')->first();
                                                @endphp
                                                <div class="range">
                                                    @if(isset($SAT))
                                                        <span>{{$SAT->start_time}} - {{$SAT->end_time}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="calender">
                                        <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                        <div class="calender-details">
                                            <div class="date">
                                                <p>SUN</p>
                                                <div class="small-line">
                                                </div>
                                            </div>
                                            @php
                                              $sun =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','sunday')->first();
                                            @endphp
                                            <div class="range">
                                                @if(isset($sun))
                                                <span>{{$sun->start_time}} - {{$sun->end_time}}</span>
                                               @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calender">
                                        <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                        <div class="calender-details">
                                            <div class="date">
                                                <p>MON</p>
                                                <div class="small-line">
                                                </div>
                                            </div>
                                            @php
                                                $Mon =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','monday')->first();
                                            @endphp
                                            <div class="range">
                                                @if(isset($Mon))
                                                    <span>{{$Mon->start_time}} - {{$Mon->end_time}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calender">
                                        <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                        <div class="calender-details">
                                            <div class="date">
                                                <p>TUE</p>
                                                <div class="small-line">
                                                </div>
                                            </div>
                                            @php
                                                $TUE =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','tuesday')->first();
                                            @endphp
                                            <div class="range">
                                                @if(isset($TUE))
                                                    <span>{{$TUE->start_time}} - {{$TUE->end_time}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calender">
                                        <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                        <div class="calender-details">
                                            <div class="date">
                                                <p>WED</p>
                                                <div class="small-line">
                                                </div>
                                            </div>
                                            @php
                                                $WED =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','wednesday')->first();
                                            @endphp
                                            <div class="range">
                                                @if(isset($WED))
                                                    <span>{{$WED->start_time}} - {{$WED->end_time}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calender">
                                        <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                        <div class="calender-details">
                                            <div class="date">
                                                <p>THU</p>
                                                <div class="small-line">
                                                </div>
                                            </div>
                                            @php
                                                $THU =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','thursday')->first();
                                            @endphp
                                            <div class="range">
                                                @if(isset($THU))
                                                    <span>{{$THU->start_time}} - {{$THU->end_time}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calender">
                                        <img src="{{asset('Profile/images/about/outline.png')}}" alt="outline image">
                                        <div class="calender-details">
                                            <div class="date">
                                                <p>FRI</p>
                                                <div class="small-line">
                                                </div>
                                            </div>
                                            @php
                                                $FRI =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','friday')->first();
                                            @endphp
                                            <div class="range">
                                                @if(isset($FRI))
                                                    <span>{{$FRI->start_time}} - {{$FRI->end_time}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade links-content p-5 px-3 py-2" id="pills-links" role="tabpanel" aria-labelledby="links-tab">
                            <h3 class="title"> {{__('lang.Links')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            <div class="links-content-body">
                                <div class="row  d-flex justify-content-center align-items-center flex-row py-3">
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
                                        $element_type = "link";
                                    }
                                    ?>

                                        <div class="link">
                                            <div class="row w-100 m-0 p-0">
                                                <div class="col-3 p-0 bg-ingo">
                                                    <div class="icon w-100 h-100  pt-1">
                                                        <a target="__blank" href="{{$profile_element->value}}"><i class=" fas fa-link"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-9 p-0">
                                                    <div class="text w-100 h-100 ">
                                                        <p class="m-0 p-0">{{$profile_element->title}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade contact-info-content p-3" id="pills-contact-info" role="tabpanel" aria-labelledby="contact-info-tab">
                            <h3 class="title"> {{__('lang.Contact info')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            <div class="contact-info-content-body">
                                <div class="row d-flex justify-content-center align-items-center flex-column py-3 m-0 px-0">
                                    @foreach($data->ElementsContact as $profile_element )
                                    <?php
                                        $contact_href = "";
                                        $element_type = "";

                                        if ($profile_element->sub_type == "website") {
                                            $element_type = '<i class="fa-solid fa-globe"></i>';
                                            $contact_href = $profile_element->value;
                                            $contact_title = $profile_element->value2;
                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                        }else if ($profile_element->sub_type == "email") {
                                            $element_type = '<i class="fa-solid fa-envelope" style="color: black !important"></i>';
                                            $contact_href = "mailto:".$profile_element->value;
                                            $contact_title = $profile_element->value2;
                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                        }else if ($profile_element->sub_type == "phone") {
                                            $element_type = '<i class="fa-solid fa-mobile-screen"></i>';
                                            $contact_href = "tel:".$profile_element->value;
                                            $contact_title = $profile_element->value2;
                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                        }else if ($profile_element->sub_type == "address") {
                                            $element_type = '<i class="fa-solid fa-location-dot" style="color: black !important"></i>';
                                            $contact_href = 'https://maps.google.com/?q='.$profile_element->value;
                                            $contact_title = __('lang.Click to open on map');
                                        }

                                        ?>
                                    @if($profile_element->sub_type != 'address')
                                        <div class="col-12">
                                        <div class="row m-0 p-0">
                                            <div class="col-3 p-2 d-flex justify-content-center align-items-center">
                                                <span>{!! $element_type !!}</span>
                                            </div>
                                            <div class="col-9 p-2 d-flex justify-content-center align-items-center">
                                                <div class="contact-detail">
                                                    <a target="_self" href="{{$contact_href}}"   style="font-size:15px">{{$profile_element->value}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @else
                                            <div class="col-12">
                                                <div class="row m-0 p-0">
                                                    <div class="map pt-4 w-100">
                                                        <iframe   src="https://maps.google.com/maps?q={{$profile_element->value}}&z=15&output=embed&z=11" width="280" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        <a target="_self" class="location-btn" href="{{$contact_href}}">Click to see location</a>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                            @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade images-content" id="pills-images" role="tabpanel" aria-labelledby="images-tab">
                            <h3 class="title"> {{__('lang.Images')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            <div class="images-content-body mt-3">
                                <div class="images-tabs">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#pills-all" type="button" role="tab" aria-controls="home" aria-selected="true">All</button>
                                        </li>
                                        @foreach(\App\Models\CategoryImage::where('profile_id',$data->id)->get() as $cat)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="rooms-tab" data-bs-toggle="tab" data-bs-target="#pills-{{$cat->id}}" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                                {{$cat->name}}</button>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="all-tab">

                                              <div class="row m-0 p-0">
                                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper roomsSwiper roomsSwiperMain">
                                                    <div class="swiper-wrapper">
                                                        @foreach(\App\Models\ProfileElement::where('profile_id',$data->id)->where('type','image')->where('is_active','active')->get() as $key =>  $Image)
                                                            <div class="swiper-slide   parent-swiper-slide "     >
                                                                <span>{{$Image->title}}</span>
                                                                <a class="example-image-link" href="{{$Image->value}}" data-lightbox="example-set" data-title="{{$Image->title}}">
                                                                <img src="{{$Image->value}}" />
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                                <div thumbsSlider="" class="swiper myRoomsSwiper myRoomsSwipermain ">
                                                    <div class="swiper-wrapper ">
                                                        @foreach(\App\Models\ProfileElement::where('profile_id',$data->id)->where('type','image')->where('is_active','active')->get() as $key =>  $Image)
                                                            <div class="swiper-slide   child-swiper-slide  ">
                                                                    <img src="{{$Image->value}}" />
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                         </div>
                                        @foreach(\App\Models\CategoryImage::where('profile_id',$data->id)->get() as $cat)
                                        <div class="tab-pane fade" id="pills-{{$cat->id}}" role="tabpanel" aria-labelledby="rooms-tab">
                                            <div class="row m-0 p-0">
                                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper roomsSwiper roomsSwiper-{{$cat->id}}">
                                                    <div class="swiper-wrapper">
                                                        @foreach(\App\Models\ProfileElement::where('category_id',$cat->id)->where('type','image')->where('is_active','active')->get() as $key =>  $Image)
                                                            <div class="swiper-slide   parent-swiper-slide "     >
                                                                <span>{{$Image->title}}</span>
                                                                <a class="example-image-link" href="{{$Image->value}}" data-lightbox="example-set" data-title="{{$Image->title}}">
                                                                    <img src="{{$Image->value}}" />
                                                                </a>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                                <div thumbsSlider="" class="swiper myRoomsSwiper myRoomsSwiper-{{$cat->id}}">
                                                    <div class="swiper-wrapper ">
                                                        @foreach(\App\Models\ProfileElement::where('category_id',$cat->id)->where('type','image')->where('is_active','active')->get() as $key =>  $Image)
                                                            <div class="swiper-slide   child-swiper-slide  ">
                                                                <img src="{{$Image->value}}" />
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade videos-content" id="pills-videos" role="tabpanel" aria-labelledby="videos-tab">
                            <h3 class="title"> {{__('lang.Videos')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            @foreach($data->ElementsVideo as $video)
                                @if($video->sub_type == 'youtube')
                                <div class="row mt-3">
                                <h5 class="mb-0 text-dark fw-bold">{{$video->title}}</h5>
                            </div>
                            <div class="row py-3">
{{--                                <div style="width: 100%;" class="plyr__video-embed" id="player-{{$video->id}}">--}}
                                    <iframe src="https://www.youtube.com/embed/{{ Str::after($video->value,'https://youtu.be/') }}" height="250px"
                                            allowfullscreen
                                            allowtransparency
                                            allow="autoplay">
                                    </iframe>
{{--                                </div>--}}
                            </div>
                                @else
                                    <div class="row mt-3">
                                        <h5 class="mb-0 text-dark fw-bold">{{$video->title}}</h5>
                                    </div>
                                    <div class="row py-3">
{{--                                        <div style="width: 100%;" class="plyr__video-embed player" id="player-{{$video->id}}">--}}
                                            <iframe src="https://www.player.vimeo.com/video/{{ Str::after($video->value,'https://vimeo.com/') }}" height="250px"
                                                    allowfullscreen
                                                    allowtransparency
                                                    allow="autoplay">
                                            </iframe>
{{--                                        </div>--}}
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="tab-pane fade appointment-content p-3" id="pills-appointment" role="tabpanel" aria-labelledby="appointment-tab">
                            <h3 class="title"> {{__('lang.Make Appointment')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            <div class="appointment-content-body py-3 ">
                                <form  method="post" action="{{url('Appointment-store')}}" >
                                    @csrf
                                    <div class="form-card py-2 px-0 mb-3">
                                        <div id="vanilla-calendar"></div>
                                        <div class="vanilla-calendar-info">
                                            <input id="vanilla-calendar-info-date" name="date" type="hidden"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-card my-3">
                                        <div class="row">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-pm-tab" data-bs-toggle="pill" data-bs-target="#pills-pm" type="button" role="tab" aria-controls="pills-profile" aria-selected="true"> time</button>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-pm" role="tabpanel" aria-labelledby="pills-pm-tab">
                                                    <div class="row m-0 p-0 px-3 d-flex justify-content-start align-items-center">
                                                        @foreach($data->Appointments as $Appointments)
                                                        <div class="col-12 ">
                                                            <div class="date-hour">
                                                                <p id="hour" data-id="{{$Appointments->id}}" class="hover time-select">{{\Carbon\Carbon::parse($Appointments->start_time)->format('H:i')}} - {{\Carbon\Carbon::parse($Appointments->end_time)->format('H:i')}}</p>
                                                            </div>
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-card p-2">
                                        <div class="form-content d-flex flex-column ">
                                            <div class="input-gp d-none">
                                                <label for="username"> hidden time </label>
                                                <input type="text" id="time" name="time" class="form-control ">
                                            </div>
                                            <div class="input-gp">
                                                <label for="username"> {{__('lang.name')}} </label>
                                                <input type="text"  required name="name" class="form-control " placeholder="{{__('lang.name')}}">
                                                <input type="hidden"  required name="appointment_id" class="form-control " id="appointment_time">
                                                <input type="hidden"  required name="profile_id" class="form-control " value="{{$data->id}}">
                                            </div>
                                            <div class="input-gp">
                                                <label for="phone"> {{__('lang.phone')}} </label>
                                                <input type="tel"  name="phone" required class="form-control " placeholder="{{__('lang.phone')}}">
                                            </div>
                                            <div class="input-gp">
                                                <label for="email"> {{__('lang.email')}} </label>
                                                <input type="email" required  name="email" class="form-control " placeholder="{{__('lang.email')}}">
                                            </div>
                                            <div class="input-gp text-center">
                                                <button type="submit" id="submitBtn" class="btn my-2">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade payment-content" id="pills-payment" role="tabpanel" aria-labelledby="payment-tab">
                            <h3 class="title"> {{__('lang.Payments')}}
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            <div class="payment-content-body">
                                <div class="row">
                                    <h4>1. payment method</h4>
                                    <ul class="nav nav-pills my-3 px-4 d-flex justify-content-between align-items-center" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-bank-tab" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="true">
                                                <img src="{{asset('Profile/images/payment/bank-way.png')}}" alt="bank way">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-paypal-tab" data-bs-toggle="pill" data-bs-target="#pills-paypal" type="button" role="tab" aria-controls="pills-paypal" aria-selected="false">
                                                <img src="{{asset('Profile/images/payment/paypal-way.png')}}" alt="paypal way">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-credit-tab" data-bs-toggle="pill" data-bs-target="#pills-credit" type="button" role="tab" aria-controls="pills-credit" aria-selected="false">
                                                <img src="{{asset('Profile/images/payment/credit-way.png')}}" alt="credit way">
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content py-3" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                                            @foreach(\App\Models\Payment::where('profile_id',$data->id)->where('type','bank')->get() as $payment)
                                            <form action="#">
                                                <div class="row m-0 px-3">
                                                    <div class="col-12 p-2">
                                                        <label >{{__('lang.Account_number')}}</label>
                                                        <input type="number" class="form-control text-inputs"readonly value="{{$payment->number}}" placeholder="Account number" >
                                                    </div>
                                                    <div class="col-6 p-2">
                                                        <label>{{__('lang.bank')}}</label>
                                                        <input type="text" class="form-control text-inputs" readonly value="{{$payment->bank_name}}" placeholder="Bank name">
                                                    </div>
                                                    <div class="col-6 p-2">
                                                        <label>Iban</label>
                                                        <input type="text" class="form-control text-inputs" readonly value="{{$payment->iban}}"placeholder="Amount">
                                                    </div>

                                                </div>
                                            </form>
                                            @endforeach
                                        </div>
                                        <div class="tab-pane fade" id="pills-paypal" role="tabpanel" aria-labelledby="pills-paypal-tab">
                                            @foreach(\App\Models\Payment::where('profile_id',$data->id)->where('type','paypal')->get() as $payment)
                                                <form action="#">
                                                    <div class="row m-0 px-3">
                                                        <div class="col-12 p-2">
                                                            <label >{{__('lang.Account_number')}}</label>
                                                            <input type="number" class="form-control text-inputs"readonly value="{{$payment->number}}" placeholder="Account number" >
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        </div>
                                        <div class="tab-pane fade" id="pills-credit" role="tabpanel" aria-labelledby="pills-credit-tab">
                                            @foreach(\App\Models\Payment::where('profile_id',$data->id)->where('type','wallet')->get() as $payment)
                                                <form action="#">
                                                    <div class="row m-0 px-3">
                                                        <div class="col-12 p-2">
                                                            <label >{{__('lang.Account_number')}}</label>
                                                            <input type="number" class="form-control text-inputs"readonly value="{{$payment->number}}" placeholder="Account number" >
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade teams-content" id="pills-teams" role="tabpanel" aria-labelledby="teams-tab">
                            <h3 class="title"> Teams
                                <span class="caret-left"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="caret-right"><i class="fa-solid fa-caret-right"></i></span>
                            </h3>
                            @php
                              function  subCategory($category1 ,$companyImage){
                                    $body = '';
                                    if($category1->children){
                                    $body .= '<div class="accordion-body px-2">
                                    <div class="accordion" id="child-'.$category1->id.'">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="child-'.$category1->id.'">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#parentCollapse-'.$category1->id.'" aria-expanded="false" aria-controls="firstChildCollapse">
                                                                    '.$category1->title.'
                                                                </button>
                                                            </h2>
                                                            <div id="parentCollapse-'.$category1->id.'" class="accordion-collapse collapse" aria-labelledby="firstChildHeading" data-bs-parent="#child-'.$category1->id.'">
                                                                           <div class="accordion-body px-2">
                                                               ';
                                                                    foreach($category1->children as $child){
                                                                     $body .=   subCategory2($child ,$companyImage);
                                                                     }
                                                                      if($category1->Profiles){
                                           foreach($category1->Profiles as $profile){
                                                 if($profile->lang == 'ar'){
                                                $body .= '<div class="accordion-body px-2">
                                                <a href="'.url('P',$profile->profile_url).'" style="  color: #000!important;text-decoration: none!important;" >
                                                  <div class="card">
                                                    <div class="row w-100 m-0 p-0 py-3 ">
                                                      <div class="col-5">
                                                        <img src="'.$profile->image.'" class="image-parent" alt="image test">
                                                      </div>
                                                      <div class="col-7">
                                                        <div class="row m-0 px-3 d-flex justify-content-end ">
                                                          <img src="'.$companyImage.'" class="image-child" alt="image test">
                                                        </div>
                                                        <div class="m-0 p-0  text-start">
                                                          <p class="m-0 p-0">'.$profile->ar_first_name .' ' .$profile->ar_last_name.'</p>
                                                          <p class="m-0 p-0">' .$profile->ar_title.'</p>
                                                          <p class="m-0 p-0">' .$profile->ar_sub_title.'</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  </a>
                                                </div>';
                                                }else{
                                                     $body .= '<div class="accordion-body px-2">
                                                <a href="'.url('P',$profile->profile_url).'" style="  color: #000!important;text-decoration: none!important;" >
                                                  <div class="card">
                                                    <div class="row w-100 m-0 p-0 py-3 ">
                                                      <div class="col-5">
                                                        <img src="'.$profile->image.'" class="image-parent" alt="image test">
                                                      </div>
                                                      <div class="col-7">
                                                         <div class="row m-0 px-3 d-flex justify-content-end ">
                                                          <img src="'.$companyImage.'" class="image-child" alt="image test">
                                                        </div>
                                                        <div class="m-0 p-0  text-start">
                                                          <p class="m-0 p-0">'.$profile->en_first_name .' ' .$profile->en_first_name.'</p>
                                                          <p class="m-0 p-0">' .$profile->en_teitle.'</p>
                                                          <p class="m-0 p-0">' .$profile->en_sub_title.'</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  </a>
                                                </div>';
                                                }
                                           }
                                    }
                                                                      $body.=   '     </div>    </div>    </div></div></div>';
                                    }

                                    return $body;

                                }
                                  function  subCategory2($parent ,$companyImage){
                                    $body = '';
                                            $body = '';
                                    if($parent->children){
                                    $body .= '<div class="accordion-body px-2">

                                    <div class="accordion" id="child-'.$parent->id.'">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="first'.$parent->id.'">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#parentCollapse-'.$parent->id.'" aria-expanded="false" aria-controls="firstChildCollapse">
                                                                    '.$parent->title.'
                                                                </button>
                                                            </h2>
                                                            <div id="parentCollapse-'.$parent->id.'" class="accordion-collapse collapse" aria-labelledby="firstChildHeading" data-bs-parent="#child-'.$parent->id.'">
                                                                                                               <div class="accordion-body px-2">
                                                               ';
                                                                    foreach($parent->children as $child){
                                                                     $body .=   subCategory($child ,$companyImage);
                                                                     }
                                          if($parent->Profiles){
                                           foreach($parent->Profiles as $profile){
                                               if($profile->lang == 'ar'){
                                                $body .= '<div class="accordion-body px-2">
                                                <a href="'.url('P',$profile->profile_url).'" style="  color: #000!important;text-decoration: none!important;" >
                                                  <div class="card">
                                                    <div class="row w-100 m-0 p-0 py-3 ">
                                                      <div class="col-5">
                                                        <img src="'.$profile->image.'" class="image-parent" alt="image test">
                                                      </div>
                                                      <div class="col-7">
                                                        <div class="row m-0 px-3 d-flex justify-content-end ">
                                                          <img src="'.$companyImage.'" class="image-child" alt="image test">
                                                        </div>
                                                        <div class="m-0 p-0  text-start">
                                                          <p class="m-0 p-0">'.$profile->ar_first_name .' ' .$profile->ar_last_name.'</p>
                                                          <p class="m-0 p-0">' .$profile->ar_title.'</p>
                                                          <p class="m-0 p-0">' .$profile->ar_sub_title.'</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  </a>
                                                </div>';
                                                }else{
                                                     $body .= '<div class="accordion-body px-2">
                                                <a href="'.url('P',$profile->profile_url).'" style="  color: #000!important;text-decoration: none!important;" >
                                                  <div class="card">
                                                    <div class="row w-100 m-0 p-0 py-3 ">
                                                      <div class="col-5">
                                                        <img src="'.$profile->image.'" class="image-parent" alt="image test">
                                                      </div>
                                                      <div class="col-7">
                                                        <div class="row m-0 px-3 d-flex justify-content-end ">
                                                          <img src="'.$companyImage.'" class="image-child" alt="image test">
                                                        </div>
                                                        <div class="m-0 p-0  text-start">
                                                          <p class="m-0 p-0">'.$profile->en_first_name .' ' .$profile->en_first_name.'</p>
                                                          <p class="m-0 p-0">' .$profile->en_teitle.'</p>
                                                          <p class="m-0 p-0">' .$profile->en_sub_title.'</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  </a>
                                                </div>';
                                                }
                                           }
                                    }

                                                                      $body.=   '       </div>  </div>      </div></div></div>';
                                    }

                                    return $body;
                                }
                            @endphp
                            <div class="teams-content-body my-3 pt-3">
                                <div class="row m-0 p-0">
                                    @foreach($data->Categories as $category)
                                    <div class="accordion" id="parent-{{$category->id}}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="parentHeading">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#parentCollapse" aria-expanded="false" aria-controls="parentCollapse">
                                                    {{$category->title}}
                                                </button>
                                            </h2>
                                            <div id="parentCollapse" class="accordion-collapse collapse" aria-labelledby="parentHeading" data-bs-parent="#parent-{{$category->id}}">
                                                    @if(isset($category->children) )
                                                        @foreach($category->children as $sub)
                                                            {!! subCategory($sub ,$data->image) !!}
                                                        @endforeach
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                        </div>
                              </div>
                        </div>
                    </div>
            <!-- end of:: user-details  -->
            <!-- begin of:: footer  -->
            <footer>
                <a class="text-center w-100" target="_self" href="{{url('login')}}">{{__('lang.Login')}}</a>
            </footer>
            <!-- end of:: footer  -->
        </div>
    </div>
        </div>
    </div>
</section>
<!-- end home -->
<script src="{{asset('Profile/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Profile/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('Profile/js/jquery-migrate-1.4.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.js"></script>
<script src="{{asset('Profile/js/vanilla-calendar.min.js')}}"></script>
<script src="{{asset('Profile/js/main.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="{{asset('Profile/dist/js/lightbox-plus-jquery.min.js')}}"></script>
<script>
    const player = new Plyr(document.querySelector('.js-player'));
        @foreach($data->ElementsVideo as $video)
    const player = new Plyr('#player'+{{$video->id}});
    @endforeach
</script>

<script>

    <?php
    $error_message = session()->get("error_message");
    ?>
    @if( session()->has("error_message"))

    Swal.fire({
        icon: 'error',
        title: '{{__('lang.error')}}',
        text: '{{$error_message}}!',
    })

    @endif
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

<script>

    var calendarInfoDate = document.querySelector('#vanilla-calendar-info-date');
    var calendarInfoTime = document.querySelector('#vanilla-calendar-info-time');
    var username = document.getElementById("username");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var submitBtn = document.getElementById("submitBtn");


    submitBtn.onclick = function () {
        var appointment = {
            date: calendarInfoDate.innerHTML,
            time: timeInput.value,
            username: username.value,
            phone: phone.value,
            email: email.value,
        };
        console.log(appointment);
        clearForm();
    }


    /************      Clear Data       ********************/
    var inputs = document.getElementsByClassName("form-control");
    function clearForm() {
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
        }
    }

    // sweet calender
    document.addEventListener('DOMContentLoaded', () => {
        const calendarInfoDate = document.querySelector('#vanilla-calendar-info-date');
        const calendarInfoTime = document.querySelector('#vanilla-calendar-info-time');
        const calendar = new VanillaCalendar('#vanilla-calendar', {
            settings: {
                lang: 'en',
                iso8601: false,

                visibility: {
                    weekNumbers: true,
                },
            },
            actions: {
                clickDay(e, dates) {
                    calendarInfoDate.value = dates[0] ? dates : '«Day not selected»';
                },
                clickWeekNumber(e, number, days, year) {
                    console.log(`Week number: ${number}, year of the week: ${year},`, 'Days of this week:', days);
                },
                clickMonth(e, month) {
                    console.log(`Current month: ${month}`);
                },
                clickYear(e, year) {
                    console.log(`Current year: ${year}`);
                },
                clickArrow(e, year, month) {
                    console.log(`Current year: ${year}, current month: ${month}`);
                },

            },
            popups: {
                '2022-12-28': {
                    modifier: 'bg-red',
                    html: 'Meeting at 9:00 PM',
                },
                '2022-09-13': {
                    modifier: 'bg-red',
                    html: 'Meeting at 6:00 PM',
                },
                '2022-11-17': {
                    modifier: 'bg-orange s',
                    html: `<div>
          <u><b>12:00 PM</b></u>
          <p style="margin: 5px 0 0; text-align: left; font-size: 12px;">Airplane in Las Vegas</p>
        </div>`,
                },
            },
            DOMTemplates: {
                default: `
        <div class="vanilla-calendar-header">
          <div class="vanilla-calendar-header__content ">
            <#Month /> | <#Year />
          </div>
          <#ArrowPrev />
          <#ArrowNext />
        </div>
        <div class="vanilla-calendar-wrapper">
          <#WeekNumbers />
          <div class="vanilla-calendar-content">
            <#Week />
            <#Days />
          </div>
        </div>
        <#ControlTime />
      `,
                month: `
        <div class="vanilla-calendar-header">
          <div class="vanilla-calendar-header__content">
            <#Month /> | <#Year />
          </div>
        </div>
        <div class="vanilla-calendar-wrapper">
          <div class="vanilla-calendar-content">
            <#Months />
          </div>
        </div>
      `,
                year: `
        <div class="vanilla-calendar-header">
          <div class="vanilla-calendar-header__content">
            <#Month /> | <#Year />
          </div>
          <#ArrowPrev />
          <#ArrowNext />
        </div>
        <div class="vanilla-calendar-wrapper">
          <div class="vanilla-calendar-content">
            <#Years />
          </div>
        </div>
      `,
            },
        });
        calendar.init();
        calendarInfoTime.innerText = calendar.selectedTime;
    });

    $('.time-select').on('click',function () {
       id = $(this).data('id');
       $('#appointment_time').val(id);
    })


        var swiper = new Swiper(".myRoomsSwipermain", {
    speed: 1500,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    autoplay: {
        delay: 1000,

      },
  });
  var swiper2 = new Swiper(".roomsSwiperMain", {
    spaceBetween: 10,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
                                            @foreach(\App\Models\CategoryImage::where('profile_id',$data->id)->get() as $cat)

    var swiper = new Swiper(".myRoomsSwiper-{{$cat->id}}", {
    speed: 1500,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    autoplay: {
        delay: 1000,

      },
  });
  var swiper2 = new Swiper(".roomsSwiper-{{$cat->id}}", {
    spaceBetween: 10,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
  @endforeach

</script>
</body>
</html>
