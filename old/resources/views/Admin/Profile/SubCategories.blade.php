<div class="form-group">
    <label>{{__('lang.Category')}} </label>
    <select  class="form-control form-control-solid Category"  name="category_id[]" required >
        <option >{{__('lang.Category')}}</option>
        @foreach($Subcategories as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
        @endforeach
    </select>
</div>
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
