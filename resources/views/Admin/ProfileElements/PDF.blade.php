<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
<style>
    .modal {
        background: rgba(255, 255, 255, 0.8);
    }

    .modal-backdrop {
        display: none;
    }
</style>
<div class="dt-buttons flex-wrap" style="display:flex;">

    <!--end::Filter-->
    <!--begin::Add user-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user10">
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>
    <button data-type="active" class="activeAll btn btn-light-primary me-3">
        <i class="bi bi-unlock fs-2x"></i>
    </button>
    <button data-type="inactive" class="activeAll btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-lock fs-2x"></i>
    </button>
    <!--end::Add user-->
    <button id="delete9" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>
    <input type="hidden" id="profile-id" value="{{$id}}">


    <!--begin::Modal - Add task-->

    <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true" data-backdrop="false" >
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{__('lang.add')}} Pdf Category</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                         data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="pdf-category-form" enctype="multipart/form-data" class="form" method="post" action="{{url('store-Category')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">


                            <input type="hidden" value="image" name="type">
                            <input type="hidden" value="{{$id}}" name="profile_id">
                            <!--begin::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">{{__('lang.ar_title')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="ar_name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="" value="" />
                                <!--end::Input-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">{{__('lang.en_title')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="en_name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="" value="" />
                                <!--end::Input-->
                            </div>


                            <!--end::Input group-->


                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">{{__('lang.close')}}
                            </button>
                            <button type="button" class="btn btn-primary" id="submit-pdf-category"
                                    data-kt-users-modal-action="">
                                <span class="indicator-label">{{__('lang.save')}}</span>
                                <span class="indicator-progress">برجاء الانتظار
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    
    <div class="modal fade" id="kt_modal_add_user10" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px shadow-lg">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{__('lang.add')}} PDF File</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="" class="form" method="post" action="{{url('store-PDF')}}" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">


                            <input type="hidden" value="{{$id}}" name="profile_id">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.file')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" required />
                                <!--end::Input-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6">{{__('lang.Category')}}
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex justify-content-between">
                                    <select name="category_id" id="category" class="form-control w-75" required>
                                        <option value="">Select Category</option>
                                        @foreach($pdfCategories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-light-primary" id="open-to-save-new-category">
                                        <i class="bi bi-plus-circle-fill fs-2x"></i>
                                    </button>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7 d-none" id="new-category-field">
                                <div class="d-flex">
                                    <input type="text" id="new-category-name" class="form-control w-50 ms-1" placeholder="Enter New Category Name">
                                    <button type="button" class="btn btn-success ms-1" id="submit-save-new-category">Save</button>
                                    <button type="button" class="btn btn-danger ms-1" id="remove-category-field">
                                        <i class="bi bi-trash-fill fs-2x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-danger me-3" data-bs-dismiss="modal">{{__('lang.close')}}
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">{{__('lang.save')}}</span>
                                <span class="indicator-progress">برجاء الانتظار
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
<script type="text/javascript">
    // Category Module
    $(document).ready(function () {
        $(document).on('click', '#open-to-save-new-category', function () {
            $('#new-category-field').removeClass('d-none');
        });
        $(document).on('click', '#remove-category-field', function () {
            $('#new-category-field').addClass('d-none');
        });
        $(document).on('click', '#submit-save-new-category', function () {
            if ($('#new-category-name').val() != '') {
                $.ajax({
                    url: "{{route('store_pdf_category')}}",
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        category_name: $('#new-category-name').val(),
                        profile_id: $('#profile-id').val()
                    },
                    success: function (response) {
                        if (response.status == true) {
                            let html = '';
                            html += `<option value="">Select Category</option>`;
                                    response.pdf_categories.forEach(element => {
                                        html += `<option value="`+element.id+`">`+element.category_name+`</option>`;
                                    });
                            $('#category').html(html);
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
                            toastr.success("{{__('lang.Success')}}", response.message);
                            $('#new-category-field').addClass('d-none');
                        } else {
                            alert('Something went wrong');
                        }
                    }
                });
            } else {
                alert('Category Name Required');
            }
        });
    });
    // Category Module

    $("#delete9").on("click", function() {
        var dataList = [];
        $("input:checkbox:checked").each(function(index) {
            dataList.push($(this).val())
        })

        if (dataList.length > 0) {
            Swal.fire({
                title: "{{__('lang.warrning')}} !",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "{{__('lang.btn_yes')}}",
                cancelButtonText: "{{__('lang.btn_no')}}",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("delete-Profile_elements")}}',
                        type: "get",
                        data: {
                            'id': dataList,
                            _token: CSRF_TOKEN
                        },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                // location.reload();
                            } else {
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.operation_failed')}}", "error");
                            }
                        },
                        fail: function(xhrerrorThrown) {
                            Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.operation_failed')}}", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("{{__('lang.Success')}}", "{{__('lang.Cancelled')}}", "error");
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $(".activeAll").on("click", function() {
        var type = $(this).data('type');
        var dataList = [];
        $("#users_table8 input:checkbox:checked").each(function(index) {
            dataList.push($(this).val())
        })
        if (dataList.length > 0) {
            Swal.fire({
                title: "{{__('lang.warrning')}} !",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "{{__('lang.btn_yes')}}",
                cancelButtonText: "{{__('lang.btn_no')}}",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '{{url("activeAll-Payment")}}',
                        type: "get",
                        data: {
                            'id': dataList,
                            'type': type
                        },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.message == "Success") {
                                Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                location.reload();
                            } else {
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.operation_failed')}}", "error");
                            }
                        },
                        fail: function(xhrerrorThrown) {
                            Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.operation_failed')}}", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("{{__('lang.Success')}}", "{{__('lang.Cancelled')}}", "error");
                }
            });
        }
    });
</script>

<script>
    $('#phone').change(function() {
        var val = $(this).val();

        $.ajax({
            type: "GET",
            url: "{{url('checkPhoneValidationUser')}}",
            data: {
                'phone': val
            },
            success: function(data) {
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

    $("#state").change(function() {
        var wahda = $(this).val();

        if (wahda != '') {
            $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function($data) {
                var outs = "";
                $.each($data, function(title, id) {
                    console.log(title)
                    outs += '<option value="' + id + '">' + title + '</option>'
                });
                $('#branche').html(outs);
            });
        }
    });
</script>
<script type="text/javascript">
    $('#type9').on('change', function() {
        type = $(this).val();
        if (type == 'bank') {
            $('#payment-title').html('{{__("lang.Account_number")}}')
            document.getElementById("bank-info").style.display = "block";
        } else if (type == 'paypal') {
            $('#payment-title').html('{{__("lang.username")}}')
            document.getElementById("bank-info").style.display = "none";
        } else {
            $('#payment-title').html('{{__("lang.phone")}}')
            document.getElementById("bank-info").style.display = "none";

        }
    })
    $(function() {
        var code = "+20"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>