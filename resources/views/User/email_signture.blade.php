<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>Email Signature</TITLE>
    <META content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</HEAD>
<style>
    .zoom {
        zoom: 15;
        -moz-transform: scale(2);
        -moz-transform-origin: 0 0;
    }

</style>
<script type="text/javascript">
    function zoom() {
        document.body.style.zoom = "300%"
    }
</script>

<BODY style="font-size: 10pt; font-family: Arial, sans-serif;" onload="zoom()">

<table style="width: 370px; font-size: 10pt; FONT-FAMILY: Arial, sans-serif; " cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td style="width: 102px; font-size: 10pt; font-family: Arial, sans-serif; border-right: 1px solid #929292; vertical-align: top;" valign="top">
            <a href="{{url('P',$data->profile_url)}}" ><img src="{{$data->image}}" alt="photograph" style="border-radius:50%;border:0; height:auto; width:80px" width="80" border="0"></a>
        </td>
        <td style="width: 25px;"></td>
        <td style="width: 243px; font-size: 10pt; color:#444444; font-family: Arial, sans-serif; vertical-align: top;" valign="top">
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td style="padding-bottom: 18px;">
                        <strong>
                            <span style="font-size: 12pt; font-family: Arial, sans-serif; color:#000000;">{{$data->en_first_name}} {{$data->en_last_name}}<br></span>
                            <span style="font-family: Arial, sans-serif; font-size:10pt; color:#000000;">{{$data->en_title}}<br></span>
                            <span style="font-family: Arial, sans-serif; font-size:10pt; color:#000000;">{{$data->en_sub_title}}<br></span>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 18px;FONT-FAMILY: Arial, sans-serif;">
                        @if($data->ElementsContact->where('sub_type','phone')->first())
                              <span>
                                  <span style="font-size: 9pt; color: #000000;"><strong>T:</strong></span>
                                  <span style="font-size: 9pt; color:#000000;"> {{$data->ElementsContact->where('sub_type','phone')->first()->value }}</span>
                                  <span style="color:#929292;"> | </span>
                              </span>
                        @endif
                            @if($data->ElementsContact->where('sub_type','email')->first())
                            <span>
                                  <span style="font-size: 9pt; color: #000000;"><strong>E:</strong></span>
                                  <span style="font-size: 9pt; color:#000000;"> {{$data->ElementsContact->where('sub_type','email')->first()->value}}</span>
                              </span>
                            @endif
                    </td>
                </tr>
                <tr>
                    <td >
               <span style="font-size: 10pt; font-family: Arial, sans-serif; color: #929292;">
                         Check my Digital Business Card:
                   <a  target="_blank" href="{{url('P',$data->profile_url)}}">
                                                   <img src="{{asset('download.png')}}" style="width: 17px;"/>
                   </a>
                        </span>



                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 14px; padding-bottom: 14px;">
                        @if($data->ElementsContact->where('sub_type','address')->first())
                            <span style="font-size: 10pt; font-family: Arial, sans-serif; color: #929292;margin-top: 5px;">
                            <a style=" text-decoration: none;" href="https://maps.google.com/?q={{$data->ElementsContact->where('sub_type','address')->first()->value}}">
                                <img src="{{asset('location.png')}}" style="width: 15px;    margin-right: 6px;"/>
                            </a>
                        </span>
                        @endif
                        @foreach($data->ElementsSocial as $social)
                            @php



                                $link = $social->value;
                                $icon = '<svg style="width:15"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M562.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L405.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C189.5 251.2 196 330 246 380c56.5 56.5 148 56.5 204.5 0L562.8 267.7zM43.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C57 372 57 321 88.5 289.5L200.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C416.5 260.8 410 182 360 132c-56.5-56.5-148-56.5-204.5 0L43.2 244.3z"/></svg>';
                                if($social->sub_type == "instagram") $link = "https://www.instagram.com/".$social->value;
                                if($social->sub_type == "twitter") $link = "https://www.twitter.com/".$social->value;
                                if($social->sub_type == "snapchat") $link = "https://www.snapchat.com/add/".$social->value;
                                if($social->sub_type == "tiktok") $link = "https://www.tiktok.com/".$social->value;
                                if($social->sub_type == "whatsapp") $link = "http://api.whatsapp.com/send?phone=".$social->value;


                               if($social->sub_type == "instagram") $icon = asset('socail2/it.png');
                                if($social->sub_type == "twitter") $icon = asset('socail2/tt.png');
                                if($social->sub_type == "snapchat") $icon = asset('socail2/snapchat.png');
                                if($social->sub_type == "tiktok") $icon = asset('socail2/tiktok.png');
                                if($social->sub_type == "whatsapp") $icon = asset('socail2/whatsapp.png');
                                if($social->sub_type == "facebook") $icon = asset('socail2/fb.png');
                                if($social->sub_type == "youtube") $icon = asset('socail2/yt.png');
                                if($social->sub_type == "linkedin") $icon = asset('socail2/in.png');
                                if($social->sub_type == "github") $icon = asset('socail2/github.png');

                            @endphp
                        <span    style="font-size: 10pt; font-family: Arial, sans-serif; color: #929292;margin-top: 5px;">
                            <a  target="_blank" style=" text-decoration: none;" href="{{$link}}" ta_blank" rget="rel="noopener">
                                <img  src="{{$icon}}" width="15px"/>
                            </a>
                            &nbsp;
                        </span>
                        @endforeach

                       </td>
                </tr>

                </tbody>
            </table>

        </td>

    </tr>

    </tbody>
</table>

</BODY>
</HTML>
