

<form class="px-10" novalidate="novalidate" id="kt_form2"  method="post" action='{{url('Update_Profile_Deparment')}}' enctype="multipart/form-data">
    <!--begin: Wizard Step 1-->
    @csrf
    <div id="devCategories">
        <div class="form-group">
            <label>{{__('lang.Category')}} </label>
            <select  class="form-control form-control-solid Category"  name="category_id[]" required >
                <option >{{__('lang.Category')}}</option>
            @foreach($categories as $cat)
                  <option value="{{$cat->id}}">{{$cat->title}}</option>
                @endforeach
            </select>
            <input type="hidden" class="form-control form-control-solid"  value="{{$data->id}}" name="id" required placeholder="{{__('lang.profile_id')}}" >
        </div>
    </div>

    <!--end: Wizard Actions-->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
    </div>
</form>


<script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>

<!--begin::Page scripts(used by this page) -->
<script>
    $('.Category').on('change',function () {
        var value = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{url('SubDepartment')}}",
            data: {"id": value},
            success: function (data) {
                $("#devCategories").append(data)
            }
        })

    })


</script>
<!--begin::Page scripts(used by this page) -->
