<ul style="display: flex;justify-content: center" class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'social_links'  )  active @endif" href="{{url('Profile_elements/social_links',$data->id)}}">{{__('lang.social_links')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'links'  )  active @endif" href="{{url('Profile_elements/links',$data->id)}}">{{__('lang.links')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'Images'  )  active @endif" href="{{url('Profile_elements/Images',$data->id)}}">{{__('lang.Images')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'videos'  )  active @endif" href="{{url('Profile_elements/videos',$data->id)}}">{{__('lang.videos')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'contacts_info'  )  active @endif" href="{{url('Profile_elements/contacts_info',$data->id)}}">{{__('lang.contacts_info')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2)  == 'business_hours'  )  active @endif"  href="{{url('Profile_elements/business_hours',$data->id)}}">{{__('lang.business_hours')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'Appointments'  )  active @endif" href="{{url('Profile_elements/Appointments',$data->id)}}">{{__('lang.Appointments')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'Payments'  )  active @endif"  href="{{url('Profile_elements/Payments',$data->id)}}">{{__('lang.Payments')}}</a>
    </li>
    @if($data->User->type == 'company')
    <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)  == 'Category'  )  active @endif"  href="{{url('Profile_elements/Category',$data->id)}}">{{__('lang.departments')}}</a>
    </li>
        @endif
</ul>
