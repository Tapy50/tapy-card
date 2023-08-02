<style>
    body {
        font-family: Arial;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    img {
        vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }
    .btn{
        list-style:none;
        background-color: #000000;
        color: #FFF;
        border: 1px solid ;
        padding: 5px 15px;
        cursor: pointer;
        font-size: 1.1rem;
        margin: .5rem;
    }
</style>

<div class="container"  >

@foreach($slider as  $key  => $Image)
    <div class="mySlides" @if($key==0) style="display: block" @endif>
        <div class="numbertext">{{$key +1}} / {{$slider->count()}}</div>
        <img src="{{$Image->value}}" style="width:100%">
    </div>
@endforeach



<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

<div class="caption-container">
    <p id="caption"></p>
</div>

<div class="row">
    @foreach($slider as  $key  => $Image)
        <div class="column">
            <img class="demo cursor  @if($key ==0)   active   @endif" src="{{$Image->value}}" style="width:100%" onclick="currentSlide(1)" alt="">
        </div>
    @endforeach
</div>

</div>
