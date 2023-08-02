@include('User.Auth.subCategoryLoop')
@foreach($Categories as $category)
    <div class="accordion-item">
        <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#collapse{{$category->id}}" aria-expanded="false" aria-controls="collapse{{$category->id}}">
            <div class="content  collapsed">
                <div class="accordion-logo">
                    <img src="{{$category->image}}" alt="">
                </div>
                <div class="accordion-details">
                    <div class="accordion-details-title">
                        <h3>{{$category->title}}</h3>
                    </div>
                    <div class="accordion-details-footer">
                        <p>6 Employees</p>
                        <span><img src="{{asset('assets/newProfile/images/icons/star.svg')}}" alt="gold star"> 4.7</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse{{$category->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <ul>
                    @if(isset($category->children) )
                        @foreach($category->children as $sub)
                            <li>
                                {!! subCategory($sub,$data->id) !!}
                            </li>
                        @endforeach
                    @else

                        <li><div class="content  collapsed " style="width:90%">
                                <div class="accordion-logo">
                                    <a href="{{url('Employees/'.$category->id.'/'.$data->id)}}">
                                        <img src="{{$category->image}}" alt="">
                                    </a>
                                </div>
                                <div class="accordion-details">
                                    <div class="accordion-details-title">
                                        <h3 >{{$category->title}}</h3>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif



                </ul>
            </div>
        </div>
    </div>
@endforeach
