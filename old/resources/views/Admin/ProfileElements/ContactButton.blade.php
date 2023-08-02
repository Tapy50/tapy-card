<style>
    .modal {
     background: rgba(255, 255, 255, 0.8);
}
.modal-backdrop {
     display: none;
}1200;

</style>
<div class="dt-buttons flex-wrap" >

    <!--end::Filter-->
    <!--begin::Add user-->
    <button type="button" href="#" class="model-show-pop   btn btn-light-primary me-3" data-bs-toggle="modal"
          >
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>
    <button  data-type="active" class="activeAll6 btn btn-light-primary me-3">
        <i class="bi bi-unlock fs-2x"></i>
    </button>
    <button   data-type="inactive" class="activeAll6 btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-lock fs-2x"></i>
    </button>
    <!--end::Add user-->
    <button id="delete6" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>

    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_add_user7" tabindex="1000000" aria-hidden="true"data-backdrop="false"
>
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{__('lang.add')}}</h2>
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
                    <form id="" class="form" method="post" action="{{url('store-Profile_elements')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">


                            <input type="hidden" value="contact" name="type">
                            <input type="hidden" value="{{$id}}" name="profile_id">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7" id="phone-div">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2" id="labelvalue">{{__('lang.phone')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="row">
                                    <div class="col-md-3 col-3" id="code" >
                                        <input type="text" name="country_code" id="txtPhone"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value="" />
                                    </div>
                                    <div class="col-md-9 col-9">
                                        <input type="text" name="value" id="value"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="" value="" required/>
                                    </div>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->  <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="sub_type" id="type">
                                    <option value="phone">Phone</option>
                                    <option value="email">Email</option>
                                    <option value="address">Address</option>
                                    <option value="website">Website</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div style="display: none" id="map">
                            <div class="fv-row mb-7">
                                <label> {{__('lang.address')}}</label>
                                <input type="text" id="search_input" placeholder=" {{__('lang.search')}}"/>
                                <input type="hidden" id="information"/>
                                <div id="us1" style="width: 100%; height: 400px;"></div>

                            </div>
                        <?php

                        $lat = !empty(old('lat')) ? old('lat') : '24.69670448385797';
                        $lng = !empty(old('lng')) ? old('lng') : '46.690517596875';

                        ?>
                        <!--begin::Form Group-->

                            <input type="hidden" value="{{$lat}}" id="lat" name="lat">
                            <input type="hidden" value="{{$lng}}" id="lng" name="lng">
                            <!--end::Input group-->
                            </div>
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active')}}
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input
                                        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                        name="is_active" type="checkbox"
                                        value="active" id="flexSwitchDefault" checked/>
                                </div>
                            </div>
                            <!--end::Input group-->


                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">{{__('lang.close')}}
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
<script>
    $('#us1').locationpicker({
        location: {
            latitude: {{$lat}},
            longitude: {{$lng}}
        },
        radius: 300,
        inputBinding: {
            latitudeInput: $('#lat'),
            longitudeInput: $('#lng'),
            // radiusInput: $('#us2-radius'),
            // locationNameInput: $('#address'),
        }

    });
    if (document.getElementById('us1')) {
        var content;
        var latitude = 24.69670448385797;
        var longitude = 46.690517596875;
        var map;
        var marker;
        navigator.geolocation.getCurrentPosition(loadMap);

        function loadMap(location) {
            if (location.coords) {
                latitude = location.coords.latitude;
                longitude = location.coords.longitude;
            }
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            var mapOptions = {
                zoom: 8,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

            };
            map = new google.maps.Map(document.getElementById("us1"), mapOptions);

            content = document.getElementById('information');
            google.maps.event.addListener(map, 'click', function (e) {
                placeMarker(e.latLng);
            });

            var input = document.getElementById('search_input');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var searchBox = new google.maps.places.SearchBox(input);

            google.maps.event.addListener(searchBox, 'places_changed', function () {
                var places = searchBox.getPlaces();
                placeMarker(places[0].geometry.location);
            });

            marker = new google.maps.Marker({
                map: map
            });
        }
    }

    function placeMarker(location) {
        marker.setPosition(location);
        map.panTo(location);
        //map.setCenter(location)
        content.innerHTML = "Lat: " + location.lat() + " / Long: " + location.lng();
        $("#value").val(location.lat() + ',' +  location.lng());
        $("#lat").val(location.lat());
        $("#lng").val(location.lng());
        google.maps.event.addListener(marker, 'click', function (e) {
            new google.maps.InfoWindow({
                content: "Lat: " + location.lat() + " / Long: " + location.lng()
            }).open(map, marker);

        });
    }


</script>

<script type="text/javascript">

    $(".activeAll6").on("click", function () {
        var type = $(this).data('type');
        var dataList = [];
        $("#users_table6 input:checkbox:checked").each(function (index) {
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
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: '{{url("activeAll-Profile_elements")}}',
                        type: "get",
                        data: {'id': dataList, 'type': type},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                location.reload();
                            } else {
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.operation_failed')}}", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
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

    $("#delete6").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
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
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("delete-Profile_elements")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                // location.reload();
                            } else {
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.operation_failed')}}", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
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
    $('#phone').change( function () {
        var val = $(this).val();

        $.ajax({
            type: "GET",
            url: "{{url('checkPhoneValidationUser')}}",
            data: {'phone': val },
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
<script type="text/javascript">
    $('#type').on('change',function () {
        type = $(this).val();
        if(type == 'email' ){
            $('#labelvalue').html('{{__('lang.email')}}')
            document.getElementById("code").style.display = "none";
            document.getElementById("map").style.display = "none";
            document.getElementById("phone-div").style.display = "block";

        }else if(type == 'phone'){
            document.getElementById("code").style.display = "block";
            document.getElementById("map").style.display = "none";
            document.getElementById("phone-div").style.display = "block";

            $('#labelvalue').html('{{__('lang.phone')}}')
        }
        else if(type == 'address'){
            document.getElementById("phone-div").style.display = "none";
            document.getElementById("map").style.display = "block";
            $('#labelvalue').html('{{__('lang.address')}}')
        }else{
            document.getElementById("code").style.display = "none";
            document.getElementById("map").style.display = "none";

            document.getElementById("phone-div").style.display = "block";

            $('#labelvalue').html('{{__('lang.url')}}')

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

    $('.model-show-pop').on('click',function(){
        $('#kt_modal_add_user7').modal('show');
    })
</script>


