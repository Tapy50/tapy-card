<html>
<title>Lets Get Started</title>
<style>
    body, html {
        height: 100%;
        margin: 0;
        background-color:black;
    }

    .bg {
        /* The image used */
        background-image: url("https://tapycard.com/public/assets/ui/assets/images/activation_page.png");

        /* Full height */
        width: 100%;

        /* Center and scale the image nicely */
        /*background-position: center;
         background-repeat: no-repeat;
         background-size: cover;*/
    }
</style>
<body>
    <a href="{{url('register',$data->serial)}}">
        <img src="{{asset('assets/media/activation_page.png')}}" width="100%" >
    </a>
</body>
</html>
