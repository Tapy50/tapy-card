@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }
    </style>
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">{{__('lang.Users_Edit')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                    <!--begin::Nav-->
                    <div class="stepper-nav mb-5">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">{{__('lang.cardinfo')}}</h3>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">{{__('lang.moreinfo')}}</h3>
                        </div>
                        <!--end::Step 2-->


                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto mw-600px w-100 pt-15 pb-10" novalidate="novalidate" method="post" id="kt_create_account_form" enctype="multipart/form-data" action="{{url('Update-Profile')}}">
                        <!--begin::Step 1-->

                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            @csrf
                            <div class="w-100">
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
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">{{__('lang.profile name')}}</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Profile name is only visible to you and not visible to others"></i>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" required class="form-control form-control-solid" placeholder="" name="name" value="{{$employee->name}}" />
                                    <input type="hidden" required class="form-control form-control-solid" placeholder="" name="id" value="{{$employee->id}}" />
                                </div>


                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Profile Url</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" readonly class="form-control form-control-solid" placeholder=""  value="https://tapycard.me/P/" name="card_name"  />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2"></label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" required class="form-control form-control-solid" placeholder="Enter Profile Url " name="profile_url" value="{{$employee->profile_url}}" />
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
                                        <span class="required">{{__('lang.language')}}</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Profile name is only visible to you and not visible to others"></i>
                                    </label>
                                    <!--end::Label-->
                                    <select required  class="form-control form-control-solid"  name="lang" id="lang">
                                        <option @if($employee->lang  == 'ar') selected @endif value="ar">{{__('lang.arabic')}}</option>
                                        <option @if($employee->lang  == 'en') selected @endif  value="en">{{__('lang.english')}}</option>
                                    </select>
                                </div>

                                @if(Auth::guard('admin')->check())

                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.user')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <select required data-control="select2" data-placeholder="Select an option" class="form-control  form-select  form-control-solid"  name="user_id"  >
                                            @foreach(\App\Models\User::all() as $user)
                                                <option @if($employee->user_id  == $user->id) selected @endif  value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <div
                                            class="form-check form-switch form-check-custom form-check-solid">
                                            <label class="form-check-label" for="flexSwitchDefault">{{__('lang.Delete')}}
                                                ؟</label>
                                            <input class="form-check-input" name="is_deleted" type="hidden"
                                                   value="0" id="flexSwitchDefault"/>
                                            <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                   name="is_deleted" type="checkbox"
                                                   value="1" id="flexSwitchDefault"
                                                   @if($employee->is_deleted == 1) checked @endif />
                                        </div>
                                    </div>

                            @endif
                                <div class="fv-row mb-7">
                                    <div
                                        class="form-check form-switch form-check-custom form-check-solid">
                                        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active')}}
                                            ؟</label>
                                        <input class="form-check-input" name="is_active" type="hidden"
                                               value="inactive" id="flexSwitchDefault"/>
                                        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                               name="is_active" type="checkbox"
                                               value="active" id="flexSwitchDefault"
                                               @if($employee->is_active == 'active') checked @endif />
                                    </div>
                                </div>
                                <div class="fv-row mb-7">
                                    <div
                                        class="form-check form-switch form-check-custom form-check-solid">
                                        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active_save_contact')}}
                                            ؟</label>
                                        <input class="form-check-input" name="active_save_contact" type="hidden"
                                               value="inactive" id="flexSwitchDefault"/>
                                        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                               name="active_save_contact" type="checkbox"
                                               value="active" id="flexSwitchDefault"
                                               @if($employee->active_save_contact == 'active') checked @endif />
                                    </div>
                                </div>
                                <div class="fv-row mb-7">
                                    <div
                                        class="form-check form-switch form-check-custom form-check-solid">
                                        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active_exchange_contact')}}
                                            ؟</label>
                                        <input class="form-check-input" name="active_exchange_contact" type="hidden"
                                               value="inactive" id="flexSwitchDefault"/>
                                        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                               name="active_exchange_contact" type="checkbox"
                                               value="active" id="flexSwitchDefault"
                                               @if($employee->active_exchange_contact == 'active') checked @endif />
                                    </div>
                                </div>
                            <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->

                                <div class="row mb-10">

                                    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">{{__('lang.ar_first_name')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"   class="form-control form-control-solid" placeholder=""   value="{{$employee->ar_first_name}}" name="ar_first_name"  />
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
                                            <input type="text" value="{{$employee->en_first_name}}"  class="form-control form-control-solid" placeholder="" name="en_first_name"  />
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
                                        <input type="text"  value="{{$employee->ar_last_name}}"  required class="form-control form-control-solid" placeholder=""   name="ar_last_name" value=" " />
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
                                            <input type="text" value="{{$employee->en_last_name}}" required class="form-control form-control-solid" placeholder="" name="en_last_name"  />
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
                                        <input type="text"  value="{{$employee->ar_title}}"  class="form-control form-control-solid" placeholder=""   name="ar_title" value=" " />
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
                                            <input type="text" value="{{$employee->en_title}}"  class="form-control form-control-solid" placeholder="" name="en_title"  />
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
                                            <span class="required">{{__('lang.ar_sub_title')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"  class="form-control form-control-solid"    name="ar_sub_title" value="{{$employee->ar_sub_title}}" />
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
                                            <input type="text"  class="form-control form-control-solid" name="en_sub_title" value="{{$employee->en_sub_title}}" />
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
                                            <span class="required">{{__('lang.ar_company')}}</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" value="{{$employee->ar_company}}"    class="form-control form-control-solid" placeholder=""   name="ar_company" value=" " />
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
                                            <input type="text"  value="{{$employee->en_company}}" class="form-control form-control-solid" name="en_company"  />
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
                                    <textarea rows="5" id="editor1" class="form-control" name="ar_about">{{$employee->ar_about}}</textarea>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="">{{__('lang.en_about')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea rows="5" id="editor2" class="form-control" name="en_about">{{$employee->en_about}}</textarea>
                                </div>




                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-15">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
															<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->{{__('lang.back')}}</button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="submit btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
														<span class="indicator-label">{{__('lang.save')}}
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-3 ms-2 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
																<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
															</svg>
														</span>
                                                            <!--end::Svg Icon--></span>
                                    <span class="indicator-progress">{{__('lang.Please wait')}}
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">{{__('lang.next')}}
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
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
                <!--end::Content-->
            </div>
            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>
    <script src="{{asset('assets/js/custom/modals/create-account.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.submit').on('click',function () {
            $('#kt_create_account_form').submit()
        })

        $('.dropify').dropify();

        $('#phone').change( function () {
            var val = $(this).val();
            var id = {{$employee->id}};

            $.ajax({
                type: "GET",
                    url: "{{url('checkPhoneValidationUser')}}",
                data: {'phone': val ,'id':id},
                success: function (data) {
                    if (data == true) {

                        var text = 'عفوا رقم الهاتف موجود بالفعل';
                        $('#error-validation').html(text)
                    } else {
                        var text = '';
                        $('#error-validation').html(text)

                    }
                }
            })
        })


        $("#state").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#branche').html(outs);
                });
            }
        });
    </script>



@endsection

