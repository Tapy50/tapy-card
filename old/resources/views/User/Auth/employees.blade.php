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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />
    <link rel="stylesheet" href="{{asset('assets/newProfile')}}/css/vanilla-calendar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/newProfile')}}/fonts/BRITANIC.ttf">
    <link rel="stylesheet" href="{{asset('assets/newProfile')}}/css/main.css">

    <title>Tapycard Profile</title>
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
                            <img src="{{asset('assets/newProfile')}}/images/icons/Star.png" alt="star icon">
                            @if($data->reviews)
                                <span>{{$data->reviews->sum('rate') / $data->reviews->count() }}</span>
                            @else
                                <span>4.7</span>
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
                            <br>
                                <a class="hover" href="{{url('P',$data->profile_url)}}" style="margin-top: 40px;">{{__('lang.back')}}</a>
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

                    <div class="horizental-line"></div>
                    <div class="tab-content" id="pills-tabContent">
                        <section id="team-details">
                            <!-- <div class="fixed-banner pt-5 px-3">
                              <img class="page-logo" src="../../../../assets/images/layouts/team.png" alt="exchange contact image " />
                              <h4 class="page-title">
                                <img src="../../../../assets/images/icons/left-arrow.png" alt="left-arrow icon" [routerLink]="['/team']" />
                                Appointment
                              </h4>
                            </div> -->
                            <app-header></app-header>
                            <div class="parent-box">
                                <div class="title">
                                    <h3 >{{$category->title}}</h3>
                                    <span>{{$category->Profiles->count()}} Employees</span>
                                </div>
                                <div class="parent-box-container">
                                    <div class="row w-100 p-0 m-0 py-2">
                                        <ul>
                                            @foreach($category->Profiles as $Profile)
                                                @if($Profile->lang == 'en')
                                            <li>
                                                <div class="content  collapsed">
                                                    <div class="accordion-logo">
                                                        <a href="{{url('P',$Profile->profile_url)}}" target="_blank">
                                                            <img src="{{$Profile->image}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="accordion-details">
                                                        <div class="accordion-details-title">
                                                            <h3   >{{$Profile->en_first_name}} {{$Profile->en_last_name}}</h3>
                                                        </div>
                                                        <div class="accordion-details-footer">
                                                            <p>{{$Profile->en_title}}</p>
                                                            <span><img src="{{asset('assets/newProfile')}}/images/icons/Star.png" alt="gold star"> 4.7</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                                @else
                                                    <li>
                                                        <div class="content  collapsed">
                                                            <div class="accordion-logo">
                                                                <a href="{{url('P',$Profile->profile_url)}}" target="_blank">
                                                                    <img src="{{$Profile->image}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="accordion-details">
                                                                <div class="accordion-details-title">
                                                                    <h3   >{{$Profile->ar_first_name}} {{$Profile->ar_last_name}}</h3>
                                                                </div>
                                                                <div class="accordion-details-footer">
                                                                    <p>{{$Profile->ar_title}}</p>
                                                                    <span><img src="{{asset('assets/newProfile')}}/images/icons/Star.png" alt="gold star"> 4.7</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                    @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- end of:: user-details  -->
            <!-- begin of:: footer  -->
            <footer>
                <a class="text-center w-100" target="_blank" href="https://tapycard.me/login">Login</a>
            </footer>
            <!-- end of:: footer  -->
        </div>
    </div>
</section>
<!-- end home -->
<script src="{{asset('assets/newProfile')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/newProfile')}}/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/newProfile')}}/js/jquery-migrate-1.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.js"></script>
<script src="{{asset('assets/newProfile')}}/js/vanilla-calendar.min.js"></script>
<script src="{{asset('assets/newProfile')}}/js/main.js"></script>
</body>
</html>
