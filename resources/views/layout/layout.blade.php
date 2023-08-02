<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en" @if(Session('lang') =='ar')dir="rtl" @endif>
<!--begin::Head-->
<head><base href="../">
    <title> Tapy||     @yield('title')
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.png')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        @if(Session('lang')  ==  'ar')
            <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
        @else
            <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

    @endif    @yield('css')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
            <!--begin::Primary-->
            <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
                <!--begin::Logo-->
                <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
                   @if(Auth::guard('admin')->check())
                    <a href="{{url('/')}}">
                        <img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}" class="h-35px" />
                    </a>
                       @else
                        <a href="{{url('/UserDashboard')}}">
                            <img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}" class="h-35px" />
                        </a>
                    @endif
                </div>
                <!--end::Logo-->
                <!--begin::Nav-->
                <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
                    <!--begin::Wrapper-->
                    <div class="hover-scroll-y mb-10" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="0px">
                        <!--begin::Nav-->
                        <ul class="nav flex-column">
                            <!--begin::Nav item-->

                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Menu">
                                <!--begin::Nav link-->
                                <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light active" data-bs-toggle="tab" href="#kt_aside_nav_tab_menu">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                    <span class="svg-icon svg-icon-2x">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
													<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
												</svg>
											</span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Nav link-->
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                                                    <!--end::Nav item-->
                        </ul>
                        <!--end::Tabs-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Nav-->
                <!--begin::Footer-->
                <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
                    <!--begin::Quick links-->
                    <!--end::Quick links-->
                    <!--begin::Activities-->
                    <div class="d-flex align-items-center mb-3">
                        <!--begin::Drawer toggle-->
                        <a @if(Session('lang') == 'en') href="{{url('lang/ar')}}" @else href="{{url('lang/en')}}" @endif class="btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="{{__('lang.language')}}" id="kt_activities_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-lg-1">
                                <i class="bi bi-translate"></i>
									</span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--end::drawer toggle-->
                    </div>
                    <!--end::Activities-->
                    <!--begin::Notifications-->
                    <!--end::Notifications-->
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="User profile">
                            <img src="{{url('/')}}/assets/media/avatars/blank.png" alt="image" />
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="assets/media/avatars/blank.png" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                            @if(Auth::guard('admin')->check())
                                                {{Auth::guard('admin')->user()->name}}
                                            @else
                                                {{Auth::guard('web')->user()->name}}
                                            @endif

                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->

                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{url('Setting')}}" class="menu-link px-5">
                                        <span class="menu-text">{{__('lang.Setting')}}</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{url('logout')}}" class="menu-link px-5">Sign Out</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Primary-->
            <!--begin::Secondary-->
            <div class="aside-secondary d-flex flex-row-fluid">
                <!--begin::Workspace-->
                <div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
                    <div class="d-flex h-100 flex-column">
                        <!--begin::Wrapper-->
                        <div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_wordspace" data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade active show" id="kt_aside_nav_tab_menu" role="tabpanel">
                                    <!--begin::Menu-->
                                    <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0" id="kt_aside_menu" data-kt-menu="true">
                                        <div id="kt_aside_menu_wrapper" class="menu-fit">
                                            <div class="menu-item">
                                                <div class="menu-content pb-2">
                                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{__('lang.Dashboard')}}</span>
                                                </div>
                                            </div>
                                            @if(Auth::guard('admin')->check())
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Dashboard')}}</span>
                                                    </a>
                                                </div>

                                                <div class="menu-item">
                                                    <div class="menu-content pt-8 pb-2">
                                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Pages</span>
                                                    </div>
                                                </div>

                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Admin_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Admins')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('User_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Users')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Card_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">
                                                        @if(Auth::guard('web')->check()  && Auth::guard('web')->user()->type == 'solo')
                                                                {{__('lang.devices')}}
                                                            @else

                                                                {{__('lang.Cards')}}
                                                            @endif
                                                    </span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Profile_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Profiles')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/ExchangeContact_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.ExchangeContact')}}</span>
                                                    </a>
                                                </div>

                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/AppointmentsRelation_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.AppointmentsRelation')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Email_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Emails')}}</span>
                                                    </a>
                                                </div>

                                            @elseif(Auth::guard('web')->check())
                                                <div class="menu-item">
                                                <a class="menu-link" href="{{url('/UserDashboard')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                    <span class="menu-title">{{__('lang.Dashboard')}}</span>
                                                </a>
                                            </div>

                                              @if(Auth::guard('web')->user()->type == 'company')
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('User_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Teams')}}</span>
                                                    </a>
                                                </div>
                                                @endif
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Card_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">
                                                        @if(Auth::guard('web')->check()  && Auth::guard('web')->user()->type == 'solo')
                                                                {{__('lang.devices')}}
                                                            @elseif(Auth::guard('web')->check()  && Auth::guard('web')->user()->type == 'company')
                                                                {{__('lang.device management')}}

                                                            @else

                                                                {{__('lang.Cards')}}
                                                            @endif
                                                    </span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Profile_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Profiles')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/ExchangeContact_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.ExchangeContact')}}</span>
                                                    </a>
                                                </div>
                                                @if(Auth::guard('web')->user()->type == 'company' || Auth::guard('web')->user()->type == 'employee' )

                                                    <div class="menu-item">
                                                        <a class="menu-link" href="{{url('reviews_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                            <span class="menu-title">{{__('lang.Reviews')}}</span>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/AppointmentsRelation_setting')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.AppointmentsRelation')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link" href="{{url('/Calendar')}}">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.Calendar')}}</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item">
                                                    <a class="menu-link"  target="_blank" href="https://tapycard.com/tapy-solo-products/">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
                                                        <span class="menu-title">{{__('lang.buy more')}}</span>
                                                    </a>
                                                </div>


                                            @endif

                                        </div>
                                    </div>

                                    <!--end::Menu-->
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <!--end::Tab pane-->
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                </div>
                <!--end::Workspace-->
            </div>
            <!--end::Secondary-->
            <!--begin::Aside Toggle-->
            <button class="btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize" style="margin-bottom: 1.35rem">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                <span class="svg-icon svg-icon-2 rotate-180">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
								<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
							</svg>
						</span>
                <!--end::Svg Icon-->
            </button>
            <!--end::Aside Toggle-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            @yield('header')
            <!--end::Header-->
            <!--begin::Content-->
            @yield('content')
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-xxl d-flex flex-column flex-md-row flex-stack">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-gray-400 fw-bold me-1">Created by</span>
                        <a href="https://corebugs.com" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Corebugs</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <!--end::Menu-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Drawers-->

<!--begin::Javascript-->
<script>var hostUrl = "{{asset('assets/')}}";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
@yield('topscript')
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/modals/users-search.js')}}"></script>
<!--end::Page Custom Javascript-->
@yield('script')

<?php
$errors = session()->get("errors");
?>

@if( session()->has("errors"))
    <?php
    $e = implode(' - ', $errors->all());
    ?>

    <script>
        Swal.fire({
            icon: 'warning',
            title: "برجاء التأكد من البيانات.",
            text: "{{$e}} ",
            type: "error",
            timer: 5000,
            showConfirmButton: false
        });
    </script>

@endif


@if( session()->has("error"))
    <?php
    $e = session()->get("error");
    ?>

    <script>
        Swal.fire({
            icon: 'warning',
            title: "برجاء التأكد من البيانات.",
            text: "كلمة المرور غير صحيحه  ",
            type: "error",
            timer: 5000,
            showConfirmButton: false
        });
    </script>

@endif
<?php
$error_message = session()->get("error_message");
?>

@if( session()->has("error_message"))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr.error("{{$error_message}}" , "عفوا !" );
    </script>

@endif
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
