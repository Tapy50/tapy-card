<form id="" class="form" method="post" action="{{url('update_Card_Profile')}}">
@csrf
<!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7"
         id="kt_modal_add_user_scroll" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}"
         data-kt-scroll-max-height="auto"
         data-kt-scroll-dependencies="#kt_modal_add_user_header"
         data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
         data-kt-scroll-offset="300px">

        <!--begin::Input group-->
        <!--end::Input group-->  <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <input type="hidden" value="{{$data->id}}" name="id">
            <label class="required fw-bold fs-6 mb-2">{{__('lang.Profile')}}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <select name="profile_id"   data-control="select2" data-placeholder="Select an option" class="form-control  form-select " id="profile">
                @foreach(\App\Models\Profile::where('user_id',Auth::guard('web')->id())->get() as $pro)
                    <option @if($pro->id == $data->profile_id ) selected @endif value="{{$pro->id}}">{{$pro->name}}</option>
                @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary"
                data-kt-users-modal-action="submit">
            <span class="indicator-label">{{__('lang.save')}}</span>
            <span class="indicator-progress">برجاء الانتظار
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Actions-->
</form>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#modal-body'),
        });
    });
</script>
