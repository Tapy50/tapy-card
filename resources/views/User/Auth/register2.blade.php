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
<html lang="en">
<!--begin::Head-->
<head><base href="../../">
    <title>Tapy || Register</title>
    <meta charset="utf-8" />
    <meta name="description" content="Tapy" />
    <meta name="keywords" content="Tapy" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Tapy" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <!--begin::Fonts-->
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Heading-->
            <div class="card-px text-center pt-15 pb-15">
                <!--begin::Title-->
                <h2 class="fs-2x fw-bolder mb-0">
                    <a href="{{url('/')}}" class="mb-12">
                        <img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}" class="h-40px" />
                    </a>
                </h2>

                <!--end::Title-->
                <!--begin::Description-->
                <p class="text-gray-400 fs-4 fw-bold py-7">Let's Create Your Account .</p>
                <!--end::Description-->
                <!--begin::Action-->
                <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Register now</a>
                <!--end::Action-->
            </div>
            <!--end::Heading-->
            <!--begin::Illustration-->
            <div class="text-center pb-15 px-5">
                <img src="assets/media/illustrations/sigma-1/2.png" alt="" class="mw-100 h-200px h-sm-325px" />
            </div>
            <!--end::Illustration-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

<!--end::Scrolltop-->
<!--begin::Modals-->
<!--begin::Modal - Upgrade plan-->
<!--end::Modal - Upgrade plan-->
<!--begin::Modal - Create App-->
<!--end::Modal - Create App-->
<!--begin::Modal - Offer A Deal-->
<div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content modal-rounded">
            <!--begin::Modal header-->
            <div class="modal-header py-7 d-flex justify-content-between">
                <!--begin::Modal title-->
                    <h2>Register</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper">
                    <!--begin::Nav-->
                    <div class="stepper-nav justify-content-center py-2">
                        <!--begin::Step 1-->
                        <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Account</h3>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">Profile</h3>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <!--end::Step 4-->
                        <!--begin::Step 5-->

                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto w-100 mw-600px pt-15 pb-10" method="post" action="{{url('register')}}" novalidate="novalidate" id="kt_create_account_form">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            @csrf
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder d-flex align-items-center text-dark">Account
                                    </h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label mb-3">name : </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" id="name" class="form-control form-control-lg form-control-solid" name="name" />
                                    <input type="hidden"  class="form-control form-control-lg form-control-solid" name="card_id" value="{{$data->id}}" />
                                    <input type="hidden"  class="form-control form-control-lg form-control-solid" name="type" value="{{$data->type}}" />
                                    <!--end::Input-->
                                </div>

                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label mb-3">phone : </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="phone" />
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label mb-3">Email : </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-lg form-control-solid" name="email" />
                                    <!--end::Input-->
                                </div>
                                <div class=" mb-7 row">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">Username :</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="col-md-6">
                                        <input type="text" name="url"  readonly
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value="https://s.tapycard.com/" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="username" id="serial"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value=""
                                        />
                                    </div>
                                </div>

                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label mb-3">Password : </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="password" />
                                    <!--end::Input-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label mb-3">Password Confirmation: </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" />
                                    <!--end::Input-->
                                </div>
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label mb-3">Language : </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="lang" class="form-control">
                                        <option value="ar">العربية</option>
                                        <option value="english">English</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                    <!--begin::Roles-->
                                    <!--begin::Input row-->
                                    <div class="d-flex fv-row">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="" type="checkbox"id="kt_modal_update_role_option_0" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                <div class="fw-bolder text-gray-800">I agree to join Tapy's mailing list</div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                    <!--end::Input row-->
                                    <div class='separator separator-dashed my-5'></div>
                                    <!--begin::Input row-->
                                    <div class="d-flex fv-row">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                <div class="fw-bolder text-gray-800">I agree to privacy <a href="{{url('policy')}}">policy</a> & <a href="{{url('terms')}}">terms</a> </div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                    <!--end::Input row-->
                                    <div class='separator separator-dashed my-5'></div>
                                    <!--end::Input row-->
                                    <!--end::Roles-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->

                            <!--end::Heading-->

                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder d-flex align-items-center text-dark">Profile
                                    </h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <!--end::Notice-->
                                </div>
                                <!--begin::Heading-->
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">{{__('lang.image')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <input type="file" class="dropify" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">{{__('lang.cover')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <input type="file" class="dropify" name="cover">
                                        </div>
                                    </div>
                                </div>

                                <div class=" mb-7 row">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">Profile Url :</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="col-md-6">
                                        <input type="text" name="url"  readonly
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value="https://s.tapycard.com/" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="profile_url"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value=""
                                        />
                                    </div>
                                </div>

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_first_name')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" required  class="form-control form-control-solid" placeholder=""   name="ar_first_name"  />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_first_name')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" placeholder="" name="en_first_name"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_last_name')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"  required class="form-control form-control-solid" placeholder=""   name="ar_last_name" value=" " />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_last_name')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" placeholder="" name="en_last_name"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_title')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"  required class="form-control form-control-solid" placeholder=""   name="ar_title" value=" " />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_title')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" placeholder="" name="en_title"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_job_title')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" required class="form-control form-control-solid" placeholder=""   name="ar_job_title" value=" " />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_job_title')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" name="en_job_title"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>
                                @if($data->type == 'employee')

                                    <input type="hidden" required  class="form-control form-control-solid" placeholder=""   name="ar_company" value="{{\App\Models\Profile::where('company_id',$data->company_id)->first()->ar_company}} " />
                                    <input type="hidden" required  class="form-control form-control-solid" placeholder=""   name="en_company" value="{{\App\Models\Profile::where('company_id',$data->company_id)->first()->en_company}}" />


                                @else

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_company')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" required  class="form-control form-control-solid" placeholder=""   name="ar_company" value=" " />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_company')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" name="en_company"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>
                                @endif
                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_sub_title')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" required class="form-control form-control-solid"    name="ar_sub_title" value=" " />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_sub_title')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" name="en_sub_title"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_designation')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"  required class="form-control form-control-solid" placeholder=""   name="ar_designation" value=" " />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.en_designation')}}</span>
                                        </label>                                                <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" name="en_designation"  />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="">{{__('lang.ar_about')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea rows="5" class="form-control" name="ar_about"></textarea>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="">{{__('lang.en_about')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea rows="5" class="form-control" name="en_about"></textarea>
                                </div>




                                <!--end::Input group-->
                            </div>

                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <!--end::Step 5-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-10">
                            <!--begin::Wrapper-->
                            <div class="me-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-3 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
											</svg>
										</span>
                                    <!--end::Svg Icon-->Back</button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="submit btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-3 ms-2 me-0">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
												</svg>
											</span>
                                                <!--end::Svg Icon--></span>
                                    <span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-3 ms-1 me-0">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
												<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
											</svg>
										</span>
                                    <!--end::Svg Icon--></button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--begin::Modal body-->
        </div>
    </div>
</div>
<!--end::Modal - Offer A Deal-->
<!--begin::Modal - Users Search-->
<!--end::Modal - Invite Friend-->
<!--end::Modals-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<!--end::Page Custom Javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.submit').on('click',function () {
        $('#kt_create_account_form').submit()
    })
    $('.dropify').dropify();

    "use strict";
    var KTCreateCampaign = (function () {
        var e,
            a,
            t,
            n,
            o,
            i,
            l = [];
        return {
            init: function () {
                (e = document.querySelector("#kt_modal_create_campaign")) &&
                (new bootstrap.Modal(e),
                    (a = document.querySelector("#kt_modal_create_campaign_stepper")),
                    (t = document.querySelector("#kt_modal_create_campaign_stepper_form")),
                    (n = a.querySelector('[data-kt-stepper-action="submit"]')),
                    (o = a.querySelector('[data-kt-stepper-action="next"]')),
                    (i = new KTStepper(a)).on("kt.stepper.changed", function (e) {
                        4 === i.getCurrentStepIndex()
                            ? (n.classList.remove("d-none"), n.classList.add("d-inline-block"), o.classList.add("d-none"))
                            : 5 === i.getCurrentStepIndex()
                            ? (n.classList.add("d-none"), o.classList.add("d-none"))
                            : (n.classList.remove("d-inline-block"), n.classList.remove("d-none"), o.classList.remove("d-none"));
                    }),
                    i.on("kt.stepper.next", function (e) {
                        console.log("stepper.next");
                        var a = l[e.getCurrentStepIndex() - 1];
                        a
                            ? a.validate().then(function (a) {
                                console.log("validated!"),
                                    "Valid" == a
                                        ? e.goNext()
                                        : Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { confirmButton: "btn btn-light" },
                                        }).then(function () {});
                            })
                            : (e.goNext(), KTUtil.scrollTop());
                    }),
                    i.on("kt.stepper.previous", function (e) {
                        console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop();
                    }),
                    n.addEventListener("click", function (e) {
                        e.preventDefault(),
                            (n.disabled = !0),
                            n.setAttribute("data-kt-indicator", "on"),
                            setTimeout(function () {
                                n.removeAttribute("data-kt-indicator"), (n.disabled = !1), i.goNext();
                            }, 2e3);
                    }),
                    (function () {
                        var e = document.querySelector("#kt_modal_create_campaign_age_slider"),
                            a = document.querySelector("#kt_modal_create_campaign_age_min"),
                            n = document.querySelector("#kt_modal_create_campaign_age_max");
                        noUiSlider.create(e, { start: [18, 40], connect: !0, range: { min: 13, max: 80 } }),
                            e.noUiSlider.on("update", function (e, t) {
                                t ? (n.innerHTML = Math.round(e[t])) : (a.innerHTML = Math.round(e[t]));
                            });
                        var o = new Tagify(document.querySelector("#kt_modal_create_campaign_location"), {
                                delimiters: null,
                                templates: {
                                    tag: function (e) {
                                        const a = hostUrl + "media/flags/" + e.value.toLowerCase().replace(/\s+/g, "-") + ".svg";
                                        try {
                                            return `<tag title='${e.value}' contenteditable='false' spellcheck="false" class='tagify__tag ${e.class ? e.class : ""}' ${this.getAttributes(
                                                e
                                            )}>\n                                <x title='remove tag' class='tagify__tag__removeBtn'></x>\n                                <div class="d-flex align-items-center">\n                                    ${
                                                e.code ? `<img onerror="this.style.visibility = 'hidden'" class="w-25px rounded-circle me-2" src='${a}' />` : ""
                                            }\n                                    <span class='tagify__tag-text'>${e.value}</span>\n                                </div>\n                            </tag>`;
                                        } catch (e) {}
                                    },
                                    dropdownItem: function (e) {
                                        const a = hostUrl + "media/flags/" + e.value.toLowerCase().replace(/\s+/g, "-") + ".svg";
                                        try {
                                            return `<div class='tagify__dropdown__item ${
                                                e.class ? e.class : ""
                                            }'>\n                                    <img onerror="this.style.visibility = 'hidden'" class="w-25px rounded-circle me-2"\n                                         src='${a}' />\n                                    <span>${
                                                e.value
                                            }</span>\n                                </div>`;
                                        } catch (e) {}
                                    },
                                },
                                enforceWhitelist: !0,
                                whitelist: [
                                    { value: "Argentina", code: "AR" },
                                    { value: "Australia", code: "AU", searchBy: "beach, sub-tropical" },
                                    { value: "Austria", code: "AT" },
                                    { value: "Brazil", code: "BR" },
                                    { value: "China", code: "CN" },
                                    { value: "Egypt", code: "EG" },
                                    { value: "Finland", code: "FI" },
                                    { value: "France", code: "FR" },
                                    { value: "Germany", code: "DE" },
                                    { value: "Hong Kong", code: "HK" },
                                    { value: "Hungary", code: "HU" },
                                    { value: "Iceland", code: "IS" },
                                    { value: "India", code: "IN" },
                                    { value: "Indonesia", code: "ID" },
                                    { value: "Italy", code: "IT" },
                                    { value: "Jamaica", code: "JM" },
                                    { value: "Japan", code: "JP" },
                                    { value: "Jersey", code: "JE" },
                                    { value: "Luxembourg", code: "LU" },
                                    { value: "Mexico", code: "MX" },
                                    { value: "Netherlands", code: "NL" },
                                    { value: "New Zealand", code: "NZ" },
                                    { value: "Norway", code: "NO" },
                                    { value: "Philippines", code: "PH" },
                                    { value: "Singapore", code: "SG" },
                                    { value: "South Korea", code: "KR" },
                                    { value: "Sweden", code: "SE" },
                                    { value: "Switzerland", code: "CH" },
                                    { value: "Thailand", code: "TH" },
                                    { value: "Ukraine", code: "UA" },
                                    { value: "United Kingdom", code: "GB" },
                                    { value: "United States", code: "US" },
                                    { value: "Vietnam", code: "VN" },
                                ],
                                dropdown: { enabled: 1, classname: "extra-properties" },
                            }),
                            l = o.settings.whitelist.slice(0, 2);
                        o.addTags(l),
                            $("#kt_modal_create_campaign_datepicker").flatpickr({ altInput: !0, enableTime: !0, altFormat: "F j, Y H:i", dateFormat: "Y-m-d H:i", mode: "range" }),
                            new Dropzone("#kt_modal_create_campaign_files_upload", {
                                url: "https://keenthemes.com/scripts/void.php",
                                paramName: "file",
                                maxFiles: 10,
                                maxFilesize: 10,
                                addRemoveLinks: !0,
                                accept: function (e, a) {
                                    "wow.jpg" == e.name ? a("Naha, you don't.") : a();
                                },
                            });
                        const r = document.querySelector("#kt_modal_create_campaign_duration_all"),
                            c = document.querySelector("#kt_modal_create_campaign_duration_fixed"),
                            s = document.querySelector("#kt_modal_create_campaign_datepicker");
                        [r, c].forEach((e) => {
                            e.addEventListener("click", (a) => {
                                e.classList.contains("active") ||
                                (r.classList.toggle("active"), c.classList.toggle("active"), c.classList.contains("active") ? s.nextElementSibling.classList.remove("d-none") : s.nextElementSibling.classList.add("d-none"));
                            });
                        });
                        var d = document.querySelector("#kt_modal_create_campaign_budget_slider"),
                            u = document.querySelector("#kt_modal_create_campaign_budget_label");
                        noUiSlider.create(d, { start: [5], connect: !0, range: { min: 1, max: 500 } }),
                            d.noUiSlider.on("update", function (e, a) {
                                (u.innerHTML = Math.round(e[a])), a && (u.innerHTML = Math.round(e[a]));
                            }),
                            document.querySelector("#kt_modal_create_campaign_create_new").addEventListener("click", function () {
                                t.reset(), i.goTo(1);
                            });
                    })(),
                    l.push(
                        FormValidation.formValidation(t, {
                            fields: {
                                name: { validators: { notEmpty: { message: " name is required" } } },
                                avatar: { validators: { file: { extension: "png,jpg,jpeg", type: "image/jpeg,image/png", message: "Please choose a png, jpg or jpeg files only" } } },
                            },
                            plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                        })
                    ));
            },
        };
    })();
    KTUtil.onDOMContentLoaded(function () {
        KTCreateCampaign.init();
    });


</script>

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
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
