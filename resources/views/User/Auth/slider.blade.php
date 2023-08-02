<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        body {
            background: url(http://static.socialitelife.com/uploads/2015/01/16/shirtless-400x300.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .wrapper {
            width: 502px;
            margin-left: auto;
            margin-right: auto;
            background: rgba(239, 239, 239, 0.7);
            text-align: center;
            padding: 1em;
        }
        .wrapper .button-group {
            width: auto;
            padding: 1em 0;
        }
        .wrapper .button-group button {
            padding: 1em;
            background: #222;
            color: white;
            text-transform: uppercase;
            font-weight: 700;
            border: 3px solid white;
        }
        .wrapper .button-group button:hover {
            background: white;
            color: #222;
            border: 3px solid #222;
            cursor: pointer;
        }
        .wrapper .button-group .active {
            background: white;
            color: #222;
            border: 3px solid #222;
            cursor: pointer;
        }
        .wrapper .slider2 {
            height: auto !important;
        }
        .wrapper .slider2 .slick-slide {
            position: relative;
            margin: 0 1em;
        }
        .wrapper .slide {
            position: relative !important;
            left: 0 !important;
            top: 0 !important;
            margin-bottom: 1em;
        }
        .wrapper .slide img {
            width: 100%;
        }
        .wrapper .slick-nav {
            width: 100%;
            position: relative;
            list-style-type: none;
        }
        .wrapper .slick-nav button {
            padding: 1em;
            background: #222;
            color: white;
            text-transform: uppercase;
            font-weight: 700;
            border: 3px solid white;
        }
        .wrapper .slick-nav button:hover {
            background: white;
            color: #222;
            border: 3px solid #222;
            cursor: pointer;
        }
        .wrapper .slick-nav .slick-prev {
            position: absolute;
            left: 0;
        }
        .wrapper .slick-nav .slick-next {
            position: absolute;
            right: 0;
        }
        .wrapper .slick-nav .slick-dots {
            list-style-type: none;
        }
        .wrapper .slick-nav .slick-dots li {
            width: auto;
            display: inline-block;
        }
        .wrapper .slick-nav .slick-dots li button {
            padding: 1em;
            background: #222;
            color: white;
            text-transform: uppercase;
            font-weight: 700;
            border: 3px solid white;
        }
        .wrapper .slick-nav .slick-dots li button:hover {
            background: white;
            color: #222;
            border: 3px solid #222;
            cursor: pointer;
        }

    </style>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">

</head>

<body>
<div class="wrapper">
    <div class="button-group filters-button-group">
        <button class="button active js-filter filter-all" data-filter="*">All</button>
        @foreach(\App\Models\CategoryImage::where('profile_id',$data->id)->get() as $cat)
        <button class="button js-filter " data-filter=".category-{{$cat->name}}">{{$cat->name}}</button>
        @endforeach
    </div>
    <div class="slider2">
        @foreach($data->ElementsImage as $Image)
        <div class="slide category-{{$Image->category->name}}">
            <img src="{{$Image->value}}" />
        </div>
        @endforeach
    </div>

    <div class="slick-nav">
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.3/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>

    // init Isotope
    $(document).ready(function () {
        $('.slider2').slick({
            rows: 1,
            dots: true,
            appendDots: $('.slick-nav'),
            appendArrows: $('.slick-nav'),
            accessibility: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        rows: 2,
                        slidesToScroll: 1,
                        slidesToShow: 2,
                        dots: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        rows: 4,
                        slidesPerRow: 1,
                        slidesToScroll: 1,
                        slidesToShow: 1,
                        dots: true
                    }
                }
            ]
        });

        var filtered = false;

        $('.filter-all').on('click', function () {
            $('.slider2').slick('slickUnfilter');
            $('.active').removeClass('active');
            $('.filter-all').addClass('active');
            filtered = false;
        });
        @foreach(\App\Models\CategoryImage::where('profile_id',$data->id)->get() as $cat)

        $('.js-filter[data-filter=".category-{{$cat->name}}"]').on('click', function () {
            $('.slider2').slick('slickUnfilter');
            $('.slider2').slick('slickFilter', '.category-{{$cat->name}}');
            $('.active').removeClass('active');
            $('.js-filter[data-filter=".category-{{$cat->name}}"]').addClass('active');
            filtered = true;
        });
        @endforeach


    });

    // var $grid = $('.slider2').isotope({
    //    itemSelector: '.slide',
    //  });
    //  // filter functions
    //  var filterFns = {
    //    // show if number is greater than 50
    //    numberGreaterThan50: function() {
    //      var number = $(this).find('.number').text();
    //      return parseInt( number, 10 ) > 50;
    //    },
    //    // show if name ends with -ium
    //    ium: function() {
    //      var name = $(this).find('.name').text();
    //      return name.match( /ium$/ );
    //    }
    //  };
    //  // bind filter button click
    //  $('.filters-button-group').on( 'click', 'button', function() {
    //    var filterValue = $( this ).attr('data-filter');
    //    // use filterFn if matches value
    //    filterValue = filterFns[ filterValue ] || filterValue;
    //    $grid.isotope({ filter: filterValue });
    //  });
    //  // change is-checked class on buttons
    //  $('.button-group').each( function( i, buttonGroup ) {
    //    var $buttonGroup = $( buttonGroup );
    //    $buttonGroup.on( 'click', 'button', function() {
    //      $buttonGroup.find('.is-checked').removeClass('is-checked');
    //      $( this ).addClass('is-checked');
    //    });
    //  });


</script>
</body>
</html>
