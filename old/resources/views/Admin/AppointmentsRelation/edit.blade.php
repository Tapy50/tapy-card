@extends('layout.layout')

@section('css')
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
                        <h3 class="fw-bolder m-0">{{__('lang.AppointmentsRelation')}} -  {{__('lang.Users_Edit')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" action="{{url('update-AppointmentsRelation')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.date')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="" value="{{$employee->date}}" required/>

                                <input type="hidden" name="id" value="{{$employee->id}}" required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.Start Time')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" name="start_time"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="" value="{{$employee->start_time}}"
                                />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.End Time')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="time" name="end_time"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="" value="{{$employee->end_time}}" required/>
                                <!--end::Input-->
                                <span id="error-validation" style="color:red"></span>

                                <!--end::Input-->
                            </div>

                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.status')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="states">
                                    <option value="new" @if($employee->states == 'new') selected @endif  >{{__('lang.new')}}</option>
                                    <option value="complate"  @if($employee->complate == 'new') selected @endif >{{__('lang.complete')}}</option>
                                </select>

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.comment')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control" name="comment"  id="editor">{{$employee->comment}}</textarea>
                                <!--end::Input-->
                            </div>

                            <!--end::Input group-->
                            <!--end::Input group-->
                            @if(Auth::guard('admin')->check())

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
                        <!--end::Input group-->


                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">{{__('lang.save')}}
                            </button>
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
    <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>

    <script>
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

