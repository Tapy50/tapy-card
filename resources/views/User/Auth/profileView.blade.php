    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="html5,css3,bootstrap5,JavaScript,jquery">
        <meta name="author" content="mohamed_hadaey">
        <meta name="description" content="MyLink - Connect audiences to all of your content with just one link">
        <link rel="icon" href="{{asset('assets/newProfile')}}/images/navbar/tapy-black.png">
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/css/all.min.css">
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/plyr.css" />
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/css/vanilla-calendar.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/fonts/BRITANIC.ttf">
        <link rel="stylesheet" href="{{asset('assets/newProfile')}}/css/main.css">
        <link href="{{asset('Profile/dist/css/lightbox.css')}}" rel="stylesheet" />

        <title>Tapycard Profile</title>
        <style>
            .date-hour .active {
                color:#000;
                font:caption;
            }
            .vanilla-calendar{
                width:100%!important;
            }
           #accordionExample a{
                color:#000!important;
            }
        </style>
    </head>
    <body>
    <!-- start home -->
    <section id="home">
        <div class="container py-5 px-0">
            <div class="content">
                <!-- begin of:: navbar  -->
                @if($data->type == 'employee')
                <div class="navbar">
                    <!-- <img src="images/logos/tapy-light.png" alt="Tapy">
                    <a href="#">Get your card</a> -->
                    <img src="{{$data->company->image}}" alt="company-logo">
                </div>
                @endif
                <!-- end of:: navbar  -->
                <!-- begin of:: header  -->
                <header >
                    <img src="{{asset('assets/newProfile')}}/images/home/under-bg.png" class="under-bg" alt="under-bg">
                    <img src="{{$data->cover}}" class="header-bg" alt="header background">
                    <img src="{{asset('assets/newProfile')}}/images/home/border-line.png" class="border-line" alt="border-line">
                    <img src="{{$data->image}}"  class="profile-image bg-dark" alt="profile img">
                    <img src="{{asset('assets/newProfile')}}/images/home/under-profile-image.png" class="under-profile-image" alt="profile image bg ">
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
                        @if($data->User->type != 'company')
                    <div class="rate">
                        <span>Rate</span>
                        <div class="degree">
                            <img src="{{asset('assets/newProfile')}}/images/icons/star.svg" alt="star icon">
                            @if($data->reviews->count() > 0)
                                <span>{{$data->reviews->sum('rate') / $data->reviews->count() }}</span>
                            @else
                            <span>5</span>
                                @endif
                        </div>
                    </div>
                        @endif
                    <!-- <p>professor</p>
                    <span>Miss</span> -->
                    <div class="line-through"></div>
                    <div class="icons">
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
                    <div class="horizental-line"></div>
                </div>
                <!-- end of:: user-info  -->
                <!-- begin of:: user-details  -->
                <div class="user-details py-2 pb-5">
                    <div class="head ">
                        <div class="row px-3 d-flex justify-content-center align-items-center">
                            @if($data->active_save_contact == 'active')
                                <a href="{{url('vcf',$data->id)}}">{{__('lang.Save Contact')}}</a>
                            @endif
                            @if($data->active_exchange_contact == 'active' )
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

                                @if(count($data->Payments)>0)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment"
                                                type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Payments')}}</button>
                                    </li>
                                @endif
                                @if($data->User->type == 'company')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="teams-tab" data-bs-toggle="pill" data-bs-target="#pills-teams"
                                                type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Appointment')}}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="teams-tab" data-bs-toggle="pill" data-bs-target="#pills-teams"
                                                type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Teams')}}</button>
                                    </li>
                                @else
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="appointment-tab" data-bs-toggle="pill" data-bs-target="#pills-appointment"
                                                type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Appointment')}}</button>
                                    </li>
                                    @if($data->User->type == 'employee')
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="pill" data-bs-target="#pills-review"
                                                type="button" role="tab" aria-controls="pills-word" aria-selected="false">{{__('lang.Reviews')}}</button>
                                    </li>
                                        @endif
                                @endif

                            </ul>
                        </div>

                        <div class="horizental-line"></div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active about-content" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                            </div>
                            <div class="tab-pane fade about-content " id="pills-about" role="tabpanel" aria-labelledby="about-tab">
                                <section id="about">
                                    <div class="parent-box">
                                        <div class="title">
                                            <h3>{{__('lang.about')}}</h3>
                                        </div>
                                        <div class="parent-box-container">
                                            <div class="row w-100 p-0 m-0 py-2">
                                                <p>
                                                    {!! $data->about !!}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="child-box">
                                        <h3 class="title">BUSINESS HOURS
                                        </h3>
                                        <div class="child-box-container">
                                            <div class="row w-100 p-0 m-0 py-2">
                                                <ul class="business-hours">
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
                                                        @php
                                                            $SAT =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','saturday')->first();
                                                            $sun =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','sunday')->first();
                                                            $Mon =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','monday')->first();
                                                            $TUE =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','tuesday')->first();
                                                            $WED =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','wednesday')->first();
                                                            $THU =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','thursday')->first();
                                                            $FRI =  $BusinessHour->where('profile_id',$data->id)->where('is_active','active')->where('day','friday')->first();
                                                        @endphp
                                                        @if(isset($SAT))
                                                            <li><span>SATURDAY</span><div class="line-between"></div><span>{{$SAT->start_time}} - {{$SAT->end_time}}</span></li>
                                                          @else
                                                            <li><span>SATURDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif

                                                        @if(isset($sun))
                                                            <li><span>SUNDAY</span><div class="line-between"></div><span>{{$sun->start_time}} - {{$sun->end_time}}</span></li>
                                                        @else
                                                            <li><span>SUNDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif

                                                        @if(isset($Mon))
                                                            <li><span>MONDAY</span><div class="line-between"></div><span>{{$Mon->start_time}} - {{$Mon->end_time}}</span></li>
                                                        @else
                                                            <li><span>MONDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif
                                                        @if(isset($TUE))
                                                            <li><span>TUESDAY</span><div class="line-between"></div><span>{{$TUE->start_time}} - {{$TUE->end_time}}</span></li>
                                                        @else
                                                            <li><span>TUESDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif
                                                        @if(isset($WED))
                                                            <li><span>WEDNESDAY</span><div class="line-between"></div><span>{{$WED->start_time}} - {{$WED->end_time}}</span></li>
                                                        @else
                                                            <li><span>WEDNESDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif
                                                        @if(isset($THU))
                                                            <li><span>THURSDAY</span><div class="line-between"></div><span>{{$THU->start_time}} - {{$THU->end_time}}</span></li>
                                                        @else
                                                            <li><span>THURSDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif
                                                        @if(isset($FRI))
                                                            <li><span>FRIDAY</span><div class="line-between"></div><span>{{$FRI->start_time}} - {{$FRI->end_time}}</span></li>
                                                        @else
                                                            <li><span>FRIDAY</span><div class="line-between"></div><span>Closed</span></li>
                                                        @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade links-content p-5 px-3 py-2" id="pills-links" role="tabpanel" aria-labelledby="links-tab">
                                <section id="links">
                                    <div class="parent-box">
                                        <div class="title">
                                            <h3>{{__('lang.Links')}}</h3>
                                        </div>
                                        <div class="parent-box-container">
                                            <div class="row w-100 p-0 m-0 py-2">
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
                                                                <div class="col-3 p-0">
                                                                    <div class="icon w-100 h-100  pt-1">
                                                                        <a href="{{$profile_element->value}}"><i class=" fas fa-{{$element_type}}"></i></a>
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

                                        </div>
                                    </div>
                                </section>

                            </div>
                            <div class="tab-pane fade contact-info-content p-3" id="pills-contact-info" role="tabpanel" aria-labelledby="contact-info-tab">

                                <section id="employee-contact-info">
                                    <div class="parent-box">
                                        <div class="title">
                                            <h3>{{__('lang.Contact info')}}</h3>
                                        </div>
                                        <div class="parent-box-container">
                                            <div class="row w-100 p-0 m-0 py-2">
                                                <ul>
                                                    @foreach($data->ElementsContact as $profile_element )
                                                        <?php
                                                        $contact_href = "";
                                                        $element_type = "";

                                                        if ($profile_element->sub_type == "website") {
                                                            $icon = asset('assets/newProfile/images/appointment/employee/contact/icon5.png');
                                                            $element_type = '<img src="'.$icon.'" alt="">';
                                                            $contact_href = $profile_element->value;
                                                            $contact_title = $profile_element->value2;
                                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                                        }else if ($profile_element->sub_type == "email") {
                                                            $icon = asset('assets/newProfile/images/appointment/employee/contact/icon6.png');
                                                            $element_type = '<img src="'.$icon.'" alt="">';
                                                            $contact_href = "mailto:".$profile_element->value;
                                                            $contact_title = $profile_element->value2;
                                                            if ($contact_title == '')$contact_title = $profile_element->value;
                                                        }else if ($profile_element->sub_type == "phone") {
                                                            $icon = asset('assets/newProfile/images/appointment/employee/contact/icon2.png');
                                                            $element_type = '<img src="'.$icon.'" alt="">';
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

                                                                <li>
                                                                    <div class="icon">
                                                                        {!! $element_type !!}
                                                                    </div>
                                                                    <div class="text">
                                                                        <a href="{{$contact_href}}">
                                                                        <p>{{$contact_title}}</p>
                                                                        </a>
                                                                    </div>
                                                                </li>

                                                        @else
                                                                <div class="map w-100">
                                                                    <iframe   src="https://maps.google.com/maps?q={{$profile_element->value}}&z=15&output=embed&z=11" width="280" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <a target="_blank" class="location-btn" href="{{$contact_href}}">Click to see location</a>
                                                                </div>


                                                        @endif
                                                    @endforeach

                                                </ul>


                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade images-content" id="pills-images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="images-content-body mt-3">
                                    <div class="images-tabs">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#pills-all" type="button" role="tab" aria-controls="home" aria-selected="true">All ({{\App\Models\ProfileElement::where('profile_id',$data->id)->where('type','image')->where('is_active','active')->count()}}</button>
                                            </li>

                                            @foreach(\App\Models\CategoryImage::where('profile_id',$data->id)->get() as $cat)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="rooms-tab" data-bs-toggle="tab" data-bs-target="#pills-{{$cat->id}}" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                                        {{$cat->name}} ({{\App\Models\ProfileElement::where('category_id',$cat->id)->where('type','image')->where('is_active','active')->count()}})</button>
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
                                                                    <span style="display:block ;text-align: center">{{$Image->title}}</span>
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
                                                                        <span style="display:block ;text-align: center">{{$Image->title}}</span>
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

                                <section id="exchange-contact">

                                    <div class="parent-box">

                                        <div class="title">
                                            <h3>{{__('lang.Videos')}}</h3>
                                        </div>
                                        @foreach($data->ElementsVideo as $video)
                                            @if($video->sub_type == 'youtube')

                                        <div class="videos-content py-5">
                                            <div class="row py-3">
                                                <h5 class="mb-0 text-dark fw-bold text-center py-3 w-100">{{$video->title}}</h5>
                                                <div style="width: 100%;" >
                                                    <iframe width="100%" height="250px" src="https://www.youtube.com/embed/{{ Str::after($video->value,'https://youtu.be/') }}"
                                                            allowfullscreen
                                                            allowtransparency
                                                            allow="autoplay">
                                                    </iframe>
                                                </div>
                                                <P class="text-muted text-center py-4 pb-0 fw-bold">{{\Carbon\Carbon::parse($video->created_at)->format('Y-M-d')}}</P>
                                            </div>

                                        </div>
                                            @else

                                                <div class="videos-content py-5">
                                                    <div class="row py-3">
                                                        <h5 class="mb-0 text-dark fw-bold text-center py-3 w-100">{{$video->title}}</h5>
                                                        <div style="width: 100%;" >
                                                            <iframe src="https://www.player.vimeo.com/video/{{ Str::after($video->value,'https://vimeo.com/') }}" height="250px"
                                                                    allowfullscreen
                                                                    allowtransparenc    y
                                                                    allow="autoplay">
                                                            </iframe>
                                                        </div>
                                                        <P class="text-muted text-center py-4 pb-0 fw-bold">{{\Carbon\Carbon::parse($video->created_at)->format('Y-M-d')}}</P>
                                                    </div>

                                                </div>

                                            @endif
                                            @endforeach
                                    </div>
                                </section>
                            </div>

                            <div class="tab-pane fade appointment-content" id="pills-appointment" role="tabpanel" aria-labelledby="appointment-tab">
                                <section id="employee-appointment">
                                    <div class="parent-box">
                                        <div class="title">
                                            <h3>{{__('lang.Make Appointment')}}</h3>
                                        </div>
                                        <form  method="post" action="{{url('Appointment-store')}}" >
                                            @csrf
                                            <div class="parent-box-container">
                                            <div class="row w-100 p-0 m-0 py-2">
                                                <div class="appointment-card">
                                                        <div id="vanilla-calendar"></div>
                                                        <div class="vanilla-calendar-info">
                                                            <input id="vanilla-calendar-info-date" name="date" type="hidden"  class="form-control">
                                                        </div>
                                                </div>

                                                <div class="appointment-card">
                                                    <div class="row">
                                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active " id="pills-am-tab" data-bs-toggle="pill" data-bs-target="#pills-am" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Time</button>
                                                            </li>


                                                        </ul>

                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade show active " id="pills-am" role="tabpanel" aria-labelledby="pills-am-tab">
                                                                <div class="row m-0 p-0 px-3 d-flex justify-content-start align-items-center">
                                                                    @foreach($data->AppointmentsِApi as $Appointments)
                                                                        <div class="col-6 ">
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

                                                <div class="appointment-card">
                                                    <div class="appointment-details">
                                                        <ul>
                                                            <li>
                                                                <span>{{__('lang.name')}}</span>
                                                                <input name="name" class="form-control" >
                                                            </li>
                                                            <li>
                                                                <span>{{__('lang.phone')}}</span>
                                                                <input name="phone" class="form-control" >
                                                            </li>
                                                            <li>
                                                                <label for="email"> {{__('lang.email')}} </label>
                                                                <input type="email" required  name="email" class="form-control " placeholder="{{__('lang.email')}}">
                                                            </li>


                                                            <input type="hidden" name="date" value="" id="date">
                                                            <input type="hidden" name="appointment_id" value="" id="appointment_time">
    {{--                                                        <li>--}}
    {{--                                                            <span>Section</span>--}}
    {{--                                                            <p>Entry permits</p>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li>--}}
    {{--                                                            <span>Appointment Time</span>--}}
    {{--                                                            <p>Thursday, April 6, 9:00 AM</p>--}}
    {{--                                                        </li>--}}
                                                        </ul>
                                                        <div class="input-gp text-center">
                                                            <button type="submit" id="submitBtn" class="btn btn-dark my-2">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </form>
                                    </div>
                                </section>

                            </div>
                            <div class="tab-pane fade payment-content" id="pills-payment" role="tabpanel" aria-labelledby="payment-tab">
                                <section id="payment">
                                    <div class="parent-box">
                                        <div class="title">
                                            <h3>{{__('lang.Payments')}}</h3>
                                        </div>
                                        <div class="parent-box-container">
                                            <div class="row w-100 p-0 m-0 py-2">
                                                <div class="payment-content-body">
                                                    <div class="row">
                                                        <h4>1. payment method</h4>
                                                        <ul class="nav nav-pills my-3 px-4 d-flex justify-content-between align-items-center" id="pills-tab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="pills-bank-tab" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="true">
                                                                    <img src="{{asset('assets/newProfile')}}/images/payment/bank-way.png" alt="bank way">
                                                                </button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="pills-paypal-tab" data-bs-toggle="pill" data-bs-target="#pills-paypal" type="button" role="tab" aria-controls="pills-paypal" aria-selected="false">
                                                                    <img src="{{asset('assets/newProfile')}}/images/payment/paypal-way.png" alt="paypal way">
                                                                </button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="pills-credit-tab" data-bs-toggle="pill" data-bs-target="#pills-credit" type="button" role="tab" aria-controls="pills-credit" aria-selected="false">
                                                                    <img src="{{asset('assets/newProfile')}}/images/payment/credit-way.png" alt="credit way">
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
                                                                                <label >{{__('lang.usernameOrEmail')}}</label>
                                                                                <input type="text" class="form-control text-inputs"readonly value="{{$payment->number}}" placeholder="Account number" >
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

                                        </div>
                                    </div>
                                </section>



                            </div>
                            <div class="tab-pane fade teams-content" id="pills-teams" role="tabpanel" aria-labelledby="">

                                <section id="teams">
                                    <div class="parent-box">
                                        <div class="search mb-5">
                                            <input type="search" name="search" id="searchBtn" placeholder="Search...">
                                            <button id="searchPress" type="button"><img src="{{asset('assets/newProfile')}}/images/icons/Search.png" alt="search icon"></button>
                                        </div>


    @include('User.Auth.subCategoryLoop')

                                        <div class="teams-list py-5 px-2">
                                            <div class="accordion" id="accordionExample">
                                                @foreach($data->Categories as $category)
                                                    @if($category->children->count() > 0 )
                                                <div class="accordion-item">
                                                    <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapse{{$category->id}}" aria-expanded="false" aria-controls="collapse{{$category->id}}">
                                                        <div class="content  collapsed">
                                                            <div class="accordion-logo">
                                                                <img src="{{$category->image}}" alt="">
                                                            </div>
                                                                     <div class="accordion-details">
                                                                <div class="accordion-details-title">
                                                                    <h3>{{$category->title}}</h3>
                                                                </div>
                                                                <div class="accordion-details-footer">
                                                                    <p></p>
                                                                    <span><img src="{{asset('assets/newProfile/images/icons/star.svg')}}" alt="gold star"> 5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="collapse{{$category->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                @if($category->children->count() > 0 )
                                                                    @foreach($category->children as $sub)
                                                                        <li>
                                                                        {!! subCategory($sub,$data->id) !!}
                                                                        </li>
                                                                    @endforeach
                                                               @else
                                                                    <li><div class="content  collapsed " style="width:90%">
                                                                            <div class="accordion-logo">
                                                                                <a href="{{url('Employees/'.$category->id.'/'.$data->id)}}">
                                                                                    <img src="{{$category->image}}" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="accordion-details">
                                                                                <div class="accordion-details-title">
                                                                                    <h3 >{{$category->title}}</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif



                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @else
                                                        <div class="accordion-item">
                                                        <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapse{{$category->id}}" aria-expanded="false" aria-controls="collapse{{$category->id}}">
                                                            <a href="{{url('Employees/'.$category->id.'/'.$data->id)}}" style="text-decoration:none;">
                                                            <div class="content  collapsed">
                                                                <div class="accordion-logo">
                                                                    <img src="{{$category->image}}" alt="">
                                                                </div>
                                                                <div class="accordion-details">
                                                                    <div class="accordion-details-title">
                                                                        <h3>{{$category->title}}</h3>
                                                                    </div>
                                                                    <div class="accordion-details-footer">
                                                                        <p>{{\App\Models\Profile::where('category_id',$category->id)->count()}} Employee</p>
                                                                        <span><img src="{{asset('assets/newProfile/images/icons/star.svg')}}" alt="gold star"> 5</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </a>
                                                        </div>
                                                        </div>

                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </section>


                            </div>
                            <div class="tab-pane fade review-content" id="pills-review" role="tabpanel" aria-labelledby="review-tab">

                                <section id="employee-reviews">
                                    <div class="parent-box">
                                        <form action="{{url('store-review')}}" method="post">
                                            @csrf
                                            <div class="inputs">
                                                <ul>
                                                    <li>
                                                        <span>{{__('lang.name')}}</span>
                                                        <input type="text" name="name"  required placeholder=""/>
                                                    </li>
                                                    <li>
                                                        <span>{{__('lang.phone')}}</span>
                                                        <input type="text" name="phone"  required placeholder=""/>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="rate">
                                                <h3>{{__('lang.Rate Your Experience')}}</h3>
                                                <p>{{__('lang.Are you Satisfied with the Service')}} ?</p>

                                                <div class="your-review-stars">
                                                    <div class="feedback">
                                                        <div class="rating">
                                                            <input type="radio" name="rating" required id="rating-5" value="5">
                                                            <label for="rating-5"></label>
                                                            <input type="radio" name="rating"required id="rating-4" value="4">
                                                            <label for="rating-4"></label>
                                                            <input type="radio" name="rating"  required id="rating-3" value="3">
                                                            <label for="rating-3"></label>
                                                            <input type="radio" name="rating" required id="rating-2" value="2">
                                                            <label for="rating-2"></label>
                                                            <input type="radio" name="rating" required id="rating-1" value="1">
                                                            <label for="rating-1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table">
                                                <h4>{{__('lang.Tell us what can be Improved')}} ?</h4>

                                                <table class="table table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">{{__('lang.satisfied')}}</th>
                                                        <th scope="col">{{__('lang.neutral')}}</th>
                                                        <th scope="col">{{__('lang.unsatisfied')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">{{__('lang.quality')}}</th>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="quality" id="exampleRadios1" value="satisfied" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="quality" id="exampleRadios2" value="neutral" >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="quality" id="exampleRadios3" value="unsatisfied" >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('lang.quickness')}}</th>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="quickness" id="exampleRadios4" value="satisfied" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="quickness" id="exampleRadios5" value="neutral" >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="quickness" id="exampleRadios6" value="unsatisfied" >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('lang.friendliness')}}</th>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="friendliness" id="exampleRadios7" value="satisfied" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="friendliness" id="exampleRadios8" value="neutral" >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="friendliness" id="exampleRadios9" value="unsatisfied" >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="profile_id" value="{{$data->id}}">
                                                <div class="textarea">
                                                    <textarea name="note" id="" rows="5" placeholder="{{__('lang.Tell us on how can we improve')}}...."></textarea>
                                                </div>

                                                <div class="submit-btn">
                                                    <button type="submit">{{__('lang.submit')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </section>
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
    </section>
    <!-- end home -->
    <script src="{{asset('assets/newProfile')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/newProfile')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets/newProfile')}}/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="{{asset('assets/newProfile')}}/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/newProfile')}}/plyr.js"></script>
    <script src="{{asset('assets/newProfile')}}/js/vanilla-calendar.min.js"></script>
    <script src="{{asset('assets/newProfile')}}/js/main.js"></script>
    <script type="text/javascript" src="{{asset('Profile/dist/js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.16/sweetalert2.min.js" integrity="sha512-1uTOzHcEK8l4o3FoTU+cv4NuC+4OqH14d0FjnIxFAb4CuShqQl8c3LzvtK1ISQYezCF8rmDnlkh2++R1C8E6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('Profile/js/vanilla-calendar.min.js')}}"></script>

    <script>
        $('#searchPress').on('click',function () {
            id =  {{$data->id}};
            search =  $('#searchBtn').val();
            $.ajax({
                type: "GET",
                url: "{{url('searchDepartment')}}",
                data: {"id": id,'search':search},
                success: function (data) {
                    $("#accordionExample").html(data)

                }
            })
        })

    </script>

    <script>
        $('.day-number').on('click',function () {
            id = $(this).data('date');
            $('#date').val(id);
        })
        $('.time-select').on('click',function () {
            id = $(this).data('id');
            $('#appointment_time').val(id);
        })
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

    <script>

        var calendarInfoDate = document.querySelector('#c-info-date');
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
                    disabled: [
                        '2023-07-15'
                    ],
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
