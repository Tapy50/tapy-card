@extends('layout.layout')

@section('title')
    @if(isset($data->serial))
        {{__('lang.CardCalender')}}   : {{$data->serial}}
    @else
        {{__('lang.Calendar')}}
    @endif
@endsection
@section('css')
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .bootstrap-datetimepicker-widget {
            display: contents !important;
        }


    </style>
@endsection

@section('header')
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_header_container', lg: '#kt_header_container'}">
                <!--begin::Heading-->
                <h1 class="text-dark fw-bolder my-0 fs-2">
                    @if(isset($data->serial))
                    {{__('lang.CardCalender')}}   : {{$data->serial}}
                    @else
                        {{__('lang.Calendar')}}
                    @endif
                </h1>
                <!--end::Heading-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{url('/')}}" class="text-muted">{{__('lang.Dashboard')}}</a>
                    </li>
                    @if(isset($data->serial))
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url('/Card_setting')}}" class="text-muted">@if(Auth::guard('web')->check() && Auth::guard('web')->user()->type == 'solo')
                                    {{__('lang.devices')}}

                                @else
                                    {{__('lang.Card_setting')}}
                                @endif
                            </a>
                        </li>
                    @else

                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted">{{__('lang.Calendar')}}</a>
                        </li>
                    @endif

                </ul>

                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title=-->
            <!--begin::Wrapper-->
            <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                <!--begin::Aside mobile toggle-->
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2x">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside mobile toggle-->
                <!--begin::Logo-->
                <a href="../../demo7/dist/index.html" class="d-flex align-items-center">
                    <img alt="Logo" src="{{asset('assets/media/logos/logo-demo7.svg')}}" class="h-30px" />
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Wrapper-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Breadcrumb-->
@endsection

@section('content')

    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h2 class="card-title fw-bolder">Calendar</h2>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Calendar-->
                <div id="kt_calendar_app"></div>
                <!--end::Calendar-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modals-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_add_event" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" action="#" id="kt_modal_add_event_form">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder" data-kt-calendar="title">Add Event</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event_close">
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
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Input group-->
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold required mb-2">Event Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Event Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_description" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Event Location</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_location" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-9">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="kt_calendar_datepicker_allday" />
                                    <span class="form-check-label fw-bold" for="kt_calendar_datepicker_allday">All Day</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row row-cols-lg-2 g-10">
                                <div class="col">
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2 required">Event Start Date</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Pick a start date" id="kt_calendar_datepicker_start_date" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col" data-kt-calendar="datepicker">
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">Event Start Time</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Pick a start time" id="kt_calendar_datepicker_start_time" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row row-cols-lg-2 g-10">
                                <div class="col">
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2 required">Event End Date</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" name="calendar_event_end_date" placeholder="Pick a end date" id="kt_calendar_datepicker_end_date" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col" data-kt-calendar="datepicker">
                                    <div class="fv-row mb-9">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">Event End Time</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Pick a end time" id="kt_calendar_datepicker_end_time" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Modal body-->
                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="button" id="kt_modal_add_event_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--end::Modal - New Product-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_view_event" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header border-0 justify-content-end">

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary" data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
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
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body pt-0 pb-20 px-lg-17">
                        <!--begin::Row-->
                        <div class="d-flex">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
														</svg>
													</span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <div class="mb-9">
                                <!--begin::Event name-->
                                <div class="d-flex align-items-center mb-2">
                                    <span class="fs-3 fw-bolder me-3" data-kt-calendar="event_name"></span>
                                    <span class="badge badge-light-success" data-kt-calendar="all_day"></span>
                                </div>
                                <!--end::Event name-->
                                <!--begin::Event description-->
                                <div class="fs-6" data-kt-calendar="event_description"></div>
                                <!--end::Event description-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-success me-5">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" cx="12" cy="12" r="8" />
														</svg>
													</span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Event start date/time-->
                            <div class="fs-6">
                                <span class="fw-bolder">Starts</span>
                                <span data-kt-calendar="event_start_date"></span>
                            </div>
                            <!--end::Event start date/time-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="d-flex align-items-center mb-9">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<circle fill="#000000" cx="12" cy="12" r="8" />
														</svg>
													</span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Event end date/time-->
                            <div class="fs-6">
                                <span class="fw-bolder">Ends</span>
                                <span data-kt-calendar="event_end_date"></span>
                            </div>
                            <!--end::Event end date/time-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                            <!--end::Svg Icon-->
                            Notes  :
                            <br>
                            <!--end::Icon-->
                            <!--begin::Event location-->
                            <div class="fs-6" data-kt-calendar="event_location"></div>
                            <!--end::Event location-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Modal body-->
                </div>
            </div>
        </div>
        <!--end::Modal - New Product-->
        <!--end::Modals-->
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>

    <script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        "use strict";
        var KTAppCalendar = (function () {
            var e,
                t,
                n,
                a,
                o,
                r,
                i,
                l,
                d,
                s,
                c,
                m,
                u,
                v,
                f,
                p,
                y,
                D,
                _,
                b,
                k,
                g,
                S,
                Y,
                h,
                T,
                M,
                w,
                E,
                L,
                x = { id: "", eventName: "", eventDescription: "", eventLocation: "", startDate: "", endDate: "", allDay: !1 },
                B = !1;
            const q = (e) => {
                    C();
                    const n = x.allDay ? moment(x.startDate).format("Do MMM, YYYY") : moment(x.startDate).format("Do MMM, YYYY - h:mm a"),
                        a = x.allDay ? moment(x.endDate).format("Do MMM, YYYY") : moment(x.endDate).format("Do MMM, YYYY - h:mm a");
                    var o = {
                        container: "body",
                        trigger: "manual",
                        boundary: "window",
                        placement: "auto",
                        dismiss: !0,
                        html: !0,
                        title: "Event Summary",
                        content:
                            '<div class="fw-bolder mb-2">' +
                            x.eventName +
                            '</div><div class="fs-7"><span class="fw-bold">Start:</span> ' +
                            n +
                            '</div><div class="fs-7 mb-4"><span class="fw-bold">End:</span> ' +
                            a +
                            '</div><div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">View More</div>',
                    };
                    (t = KTApp.initBootstrapPopover(e, o)).show(), (B = !0), F();
                },
                C = () => {
                    B && (t.dispose(), (B = !1));
                },

                A = () => {
                    var e, t, n;
                    w.show(),
                        x.allDay
                            ? ((e = "All Day"), (t = moment(x.startDate).format("Do MMM, YYYY")), (n = moment(x.endDate).format("Do MMM, YYYY")))
                            : ((e = ""), (t = moment(x.startDate).format("Do MMM, YYYY - h:mm a")), (n = moment(x.endDate).format("Do MMM, YYYY - h:mm a"))),
                        (g.innerText = x.eventName),
                        (S.innerText = e),
                        (Y.innerText = x.eventDescription ? x.eventDescription : "--"),
                        (h.innerText = x.eventLocation ? x.eventLocation : "--"),
                        (T.innerText = t),
                        (M.innerText = n);
                },
                H = () => {
                    E.addEventListener("click", (t) => {
                        t.preventDefault(),
                            w.hide(),
                            (() => {
                                (f.innerText = "Edit an Event"), v.show();
                                const t = p.querySelectorAll('[data-kt-calendar="datepicker"]'),
                                    r = p.querySelector("#kt_calendar_datepicker_allday");
                                r.addEventListener("click", (e) => {
                                    e.target.checked
                                        ? t.forEach((e) => {
                                            e.classList.add("d-none");
                                        })
                                        : (d.setDate(x.startDate, !0, "Y-m-d"),
                                            t.forEach((e) => {
                                                e.classList.remove("d-none");
                                            }));
                                }),
                                    O(x),
                                    _.addEventListener("click", function (t) {
                                        t.preventDefault(),
                                        y &&
                                        y.validate().then(function (t) {
                                            console.log("validated!"),
                                                "Valid" == t
                                                    ? (_.setAttribute("data-kt-indicator", "on"),
                                                        (_.disabled = !0),
                                                        setTimeout(function () {
                                                            _.removeAttribute("data-kt-indicator"),
                                                                Swal.fire({
                                                                    text: "New event added to calendar!",
                                                                    icon: "success",
                                                                    buttonsStyling: !1,
                                                                    confirmButtonText: "Ok, got it!",
                                                                    customClass: { confirmButton: "btn btn-primary" },
                                                                }).then(function (t) {
                                                                    if (t.isConfirmed) {
                                                                        v.hide(), (_.disabled = !1), e.getEventById(x.id).remove();
                                                                        let t = !1;
                                                                        r.checked && (t = !0), 0 === c.selectedDates.length && (t = !0);
                                                                        var l = moment(i.selectedDates[0]).format(),
                                                                            s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
                                                                        if (!t) {
                                                                            const e = moment(i.selectedDates[0]).format("YYYY-MM-DD"),
                                                                                t = e;
                                                                            (l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss")), (s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss"));
                                                                        }
                                                                        e.addEvent({ id: V(), title: n.value, description: a.value, location: o.value, start: l, end: s, allDay: t }), e.render(), p.reset();
                                                                    }
                                                                });
                                                        }, 2e3))
                                                    : Swal.fire({
                                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                                        icon: "error",
                                                        buttonsStyling: !1,
                                                        confirmButtonText: "Ok, got it!",
                                                        customClass: { confirmButton: "btn btn-primary" },
                                                    });
                                        });
                                    });
                            })();
                    });
                },
                F = () => {
                    document.querySelector("#kt_calendar_event_view_button").addEventListener("click", (e) => {
                        e.preventDefault(), C(), A();
                    });
                },
                O = () => {
                    (n.value = x.eventName ? x.eventName : ""), (a.value = x.eventDescription ? x.eventDescription : ""), (o.value = x.eventLocation ? x.eventLocation : ""), i.setDate(x.startDate, !0, "Y-m-d");
                    const e = x.endDate ? x.endDate : moment(x.startDate).format();
                    d.setDate(e, !0, "Y-m-d");
                    const t = p.querySelector("#kt_calendar_datepicker_allday"),
                        r = p.querySelectorAll('[data-kt-calendar="datepicker"]');
                    x.allDay
                        ? ((t.checked = !0),
                            r.forEach((e) => {
                                e.classList.add("d-none");
                            }))
                        : (c.setDate(x.startDate, !0, "Y-m-d H:i"),
                            u.setDate(x.endDate, !0, "Y-m-d H:i"),
                            d.setDate(x.startDate, !0, "Y-m-d"),
                            (t.checked = !1),
                            r.forEach((e) => {
                                e.classList.remove("d-none");
                            }));
                },
                P = (e) => {
                    (x.id = e.id), (x.eventName = e.title), (x.eventDescription = e.description), (x.eventLocation = e.location), (x.startDate = e.startStr), (x.endDate = e.endStr), (x.allDay = e.allDay);
                },
                V = () => Date.now().toString() + Math.floor(1e3 * Math.random()).toString();
            return {
                init: function () {
                    const t = document.getElementById("kt_modal_add_event");
                    (p = t.querySelector("#kt_modal_add_event_form")),
                        (n = p.querySelector('[name="calendar_event_name"]')),
                        (a = p.querySelector('[name="calendar_event_description"]')),
                        (o = p.querySelector('[name="calendar_event_location"]')),
                        (r = p.querySelector("#kt_calendar_datepicker_start_date")),
                        (l = p.querySelector("#kt_calendar_datepicker_end_date")),
                        (s = p.querySelector("#kt_calendar_datepicker_start_time")),
                        (m = p.querySelector("#kt_calendar_datepicker_end_time")),
                        (D = document.querySelector('[data-kt-calendar="add"]')),
                        (_ = p.querySelector("#kt_modal_add_event_submit")),
                        (b = p.querySelector("#kt_modal_add_event_cancel")),
                        (k = t.querySelector("#kt_modal_add_event_close")),
                        (f = p.querySelector('[data-kt-calendar="title"]')),
                        (v = new bootstrap.Modal(t));
                    const B = document.getElementById("kt_modal_view_event");
                    var F, O, I, R, G, K;
                    (w = new bootstrap.Modal(B)),
                        (g = B.querySelector('[data-kt-calendar="event_name"]')),
                        (S = B.querySelector('[data-kt-calendar="all_day"]')),
                        (Y = B.querySelector('[data-kt-calendar="event_description"]')),
                        (h = B.querySelector('[data-kt-calendar="event_location"]')),
                        (T = B.querySelector('[data-kt-calendar="event_start_date"]')),
                        (M = B.querySelector('[data-kt-calendar="event_end_date"]')),
                        (E = B.querySelector("#kt_modal_view_event_edit")),
                        (L = B.querySelector("#kt_modal_view_event_delete")),
                        (F = document.getElementById("kt_calendar_app")),
                        (O = moment().startOf("day")),
                        (I = O.format("YYYY-MM")),
                        (R = O.clone().subtract(1, "day").format("YYYY-MM-DD")),
                        (G = O.format("YYYY-MM-DD")),
                        (K = O.clone().add(1, "day").format("YYYY-MM-DD")),
                        (e = new FullCalendar.Calendar(F, {
                            headerToolbar: { left: "prev,next today", center: "title", right: "dayGridMonth,timeGridWeek,timeGridDay" },
                            initialDate: G,
                            navLinks: !0,
                            selectable: !0,
                            selectMirror: !0,
                            select: function (e) {
                                C(), P(e), N();
                            },
                            eventClick: function (e) {
                                C(),
                                    P({ id: e.event.id, title: e.event.title, description: e.event.extendedProps.description, location: e.event.extendedProps.location, startStr: e.event.startStr, endStr: e.event.endStr, allDay: e.event.allDay }),
                                    A();
                            },
                            eventMouseEnter: function (e) {
                                P({ id: e.event.id, title: e.event.title, description: e.event.extendedProps.description, location: e.event.extendedProps.location, startStr: e.event.startStr, endStr: e.event.endStr, allDay: e.event.allDay }),
                                    q(e.el);
                            },
                            editable: !0,
                            dayMaxEvents: !0,
                            events: [
                                @foreach($data->AppointmentsRelation  as $AppointmentsRelation)
                                { id: {{$AppointmentsRelation->id}}, title: "{{$AppointmentsRelation->name}}", start: "{{$AppointmentsRelation->date}}" + "T{{$AppointmentsRelation->start_time}}", end: "{{$AppointmentsRelation->date}}" + "T{{$AppointmentsRelation->end_time}}", description: "Phone : {{$AppointmentsRelation->phone}}  ", className: "fc-event-danger", location: "{{$AppointmentsRelation->notes}}" },
                                @endforeach
                            ],
                            datesSet: function () {
                                C();
                            },
                        })).render(),
                        (y = FormValidation.formValidation(p, {
                            fields: {
                                calendar_event_name: { validators: { notEmpty: { message: "Event name is required" } } },
                                calendar_event_start_date: { validators: { notEmpty: { message: "Start date is required" } } },
                                calendar_event_end_date: { validators: { notEmpty: { message: "End date is required" } } },
                            },
                            plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                        })),
                        (i = flatpickr(r, { enableTime: !1, dateFormat: "Y-m-d" })),
                        (d = flatpickr(l, { enableTime: !1, dateFormat: "Y-m-d" })),
                        (c = flatpickr(s, { enableTime: !0, noCalendar: !0, dateFormat: "H:i" })),
                        (u = flatpickr(m, { enableTime: !0, noCalendar: !0, dateFormat: "H:i" })),
                        H(),
                        D.addEventListener("click", (e) => {
                            C(), (x = { id: "", eventName: "", eventDescription: "", startDate: new Date(), endDate: new Date(), allDay: !1 }), N();
                        }),
                        L.addEventListener("click", (t) => {
                            t.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to delete this event?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, delete it!",
                                    cancelButtonText: "No, return",
                                    customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                                }).then(function (t) {
                                    t.value
                                        ? (e.getEventById(x.id).remove(), w.hide())
                                        : "cancel" === t.dismiss && Swal.fire({ text: "Your event was not deleted!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                                });
                        }),
                        b.addEventListener("click", function (e) {
                            e.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to cancel?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, cancel it!",
                                    cancelButtonText: "No, return",
                                    customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                                }).then(function (e) {
                                    e.value
                                        ? (p.reset(), v.hide())
                                        : "cancel" === e.dismiss && Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                                });
                        }),
                        k.addEventListener("click", function (e) {
                            e.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to cancel?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, cancel it!",
                                    cancelButtonText: "No, return",
                                    customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                                }).then(function (e) {
                                    e.value
                                        ? (p.reset(), v.hide())
                                        : "cancel" === e.dismiss && Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                                });
                        }),
                        ((e) => {
                            e.addEventListener("hidden.bs.modal", (e) => {
                                y && y.resetForm(!0);
                            });
                        })(t);
                },
            };
        })();
        KTUtil.onDOMContentLoaded(function () {
            KTAppCalendar.init();
        });
    </script>
    <?php
    $message = session()->get("message");
    ?>

    @if( session()->has("message"))
        @if( $message == "Success")
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: false
                });

            </script>
        @endif
    @endif
@endsection
