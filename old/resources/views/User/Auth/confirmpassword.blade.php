
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Tapycard</title>
    <!-- plugins:css -->

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/public/assets/ui/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/profile/img/rss.svg" />
    <link rel="stylesheet" href="/assets/profile/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/profile/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://tapycard.com/public/assets/profile/fonts/tabler.css" rel="stylesheet">
    <link rel="stylesheet" href="https://demo.rajodiya.com/vcardgo-saas/assets/fonts/tabler-icons.min.css">
    <style>

        .auth.login-bg {
            background-image: url("https://wallpaperaccess.com/full/396538.jpg");
            background-size: cover;
            background-position-x: center;
        }

        .form-control:focus{
            background-color: white;
        }

        .auth.login-bg {
            background-image: unset;/*url("https://wallpaperaccess.com/full/396538.jpg");
            /*background-size: cover;
            background-position-x: center;*/
        }

        .form-control:focus{
            background-color: white;
        }


        html body {
            background-color: #f8f8f8;
            color: #5e5873 !important;
        }
        .content-wrapper {
            background-color: #f8f8f8;
        }
        .header , .navbar , .sidebar, .card, .footer{
            box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%);
            background: #fff;
            color: #5e5873 !important;
        }
        li,ul,span,a,p,h1,h2,h3,h4,h5,h6{
            color: #5e5873 !important;
        }
        .form-control, .asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .typeahead, .tt-query, .tt-hint {
            background-color: #f0f0f1;
            color: #5e5873 !important;
            border: 1px solid #f0f1f1;
        }
        .navbar .navbar-brand-wrapper {
            background-color: #fff;
        }
        .sidebar .nav .nav-item.active > .nav-link {
            background: #f8f8f8;
        }
        .sidebar .nav:not(.sub-menu) > .nav-item:hover:not(.nav-category):not(.account-dropdown) > .nav-link {
            background: #e1e1e1;
            color: #5e5873 !important;
        }
        thead, tbody, tfoot, tr, td, th {
            border-color: unset;
        }
        .navbar{
            left: 0px;
        }

        .white-txt{
            color: #ffffff !important;
        }

        .badgea {
            background: #f8f8f8;
        }


        .table > :not(caption) > * > *, .jsgrid .jsgrid-table > :not(caption) > * > * {
            background-color: #f7f7f7;
        }
        .sidebar .sidebar-brand-wrapper {
            background: #f8f8f8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #3d3d3d;
            color: #ffffff;
            border: none;
            border-radius: 0.5em !important;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.75;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: black;
        }

        .input-group-append .input-group-text, .input-group-prepend .input-group-text {
            border-color: unset;
            padding: unset;
            color: unset;
            background: unset;
        }

        .input-group-append .input-group-text, .input-group-prepend .input-group-text {
            border-color: unset;
            padding: unset;
            color: unset;
            background: unset;
        }

        .card-body{
            padding: 1em !important;
        }

        .form-control {
            border-radius: 0.35rem;
        }

    </style>

    <style>
        @import  url(https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700);

        body{
            overflow:hidden;
        }

        .preloader{
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 10000;
            background-color: #f8f8f8;
        }

        .light-layout .preloader {
            background-color: #f8f8f8;
        }

        .logo-row {
            width: 250px;
            margin: 0 auto;
        }

        .logopre {
            display: flex;
            padding: 40vh 0vh;
        }

        .mss-1{
            font-size: 2em !important;
            margin-top: 0.25em;
            font-weight: 700 !important;
            margin-left: 0.25rem!important;
        }

        .brand-text{
            font-family:Manrope,sans-serif;
        }

        .mss-1{
            color: #ffffff;
        }

        .light-layout .mss-1{
            color: #343f52 !important;
        }

        .dark-layout .mss-1{
            color: #ffffff !important;
        }


        /*.justify-content-between .logo-txt-light{
            color: #ffffff;
        }*/

        .preloader-logo-icon{
            width: 20em;
        }

        /* --------------------------------------------- */

        body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Oxygen","Ubuntu","Cantarell","Fira Sans","Droid Sans","Helvetica Neue",sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}code{font-family:source-code-pro,Menlo,Monaco,Consolas,"Courier New",monospace}body.modal-open nav.main-header{width:100%}.App{background-color:#272727;color:#fff;min-height:100vh}.App>*{max-width:500px!important;margin-left:auto!important;margin-right:auto!important}.App .notifications-component{max-width:500px;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.App-logo{height:40vmin;pointer-events:none}@media (prefers-reduced-motion:no-preference){.App-logo{-webkit-animation:App-logo-spin 20s linear infinite;animation:App-logo-spin 20s linear infinite}}.App-header{background-color:#282c34;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:calc(10px + 2vmin);color:#fff}.App-link{color:#61dafb}@-webkit-keyframes App-logo-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes App-logo-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}.main-header{background-color:#383838;border-radius:0 0 12px 12px;height:70px;position:fixed!important;width:100%;max-width:unset!important;top:0;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%);z-index:10}.navbar{justify-content:space-between!important}.navbar-brand{height:65%;position:absolute;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%);display:flex!important;align-items:center;justify-content:center;margin-right:0!important}.navbar-toggle{border:none!important;margin-right:25%;cursor:pointer}.nav-link{background-color:transparent!important;border-color:#fff!important;padding-top:1.8px!important;padding-bottom:2.5px!important;font-weight:600!important;font-size:.8rem!important}#share-button{font-size:14px;position:relative}#link-button{background-color:hsla(0,0%,100%,.4)!important;border:none!important;border-radius:15px;height:35px;width:250px;font-size:1.4rem!important}.main-header .hamburger-icon{fill:#fff;width:26px;height:24px}.openNavBar .modal-dialog{margin:1rem}.openNavBar .tapy-logo{height:30px;position:absolute;left:50%;-webkit-transform:translate(-50%,5px);transform:translate(-50%,5px)}.openNavBar .modal-content{background-color:#272727!important;color:#d3d3d3!important;box-shadow:none;border:3.5px double transparent;border-radius:12px!important;background-image:linear-gradient(#272727,#272727),linear-gradient(180deg,#567df4,#6200ee);background-origin:border-box;background-clip:padding-box,border-box;width:310px;height:551px}.openNavBar .modal-body{padding:0 1rem}.openNavBar .modal-body>a{display:block;color:#fff!important;margin:24px 10px;padding:0;letter-spacing:.15px;font-weight:700;cursor:pointer;font-size:18px!important;line-height:30px}.openNavBar .modal-header{border:none;flex-direction:row-reverse}.openNavBar .modal-header a{height:90%;flex:1 1;display:flex;align-items:center;justify-content:center;padding-right:36px}.openNavBar .modal-header a img{height:85%}.openNavBar .modal-header button.close{display:flex;width:35px;height:35px;background-color:hsla(0,0%,100%,.4);border-radius:50%;margin:0;padding:0}.openNavBar .modal-header button.close span{text-shadow:none;width:100%;height:100%;font-weight:400;font-size:30px}.openNavBar .modal-header button.close span.sr-only{display:none}.openNavBar .modal-footer{border:none}.openQRCode{position:absolute;opacity:1;top:0;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%);z-index:10;width:100vw;height:100vh;max-width:unset!important;align-items:center;justify-content:center;background:rgba(0,0,0,.4);transition:all .3s ease-in-out}.openQRCode.hidden{display:none}.openQRCode.hidden .modal-content{opacity:0}.openQRCode.show{display:flex}.openQRCode.show .modal-content{opacity:1}.openQRCode .tapy-logo{height:30px;position:absolute}.openQRCode .modal-content{background-color:#272727!important;color:#d3d3d3!important;box-shadow:none;border:3.5px double transparent;border-radius:12px!important;background-image:linear-gradient(#272727,#272727),linear-gradient(180deg,#567df4,#567df4);background-origin:border-box;background-clip:padding-box,border-box;min-height:400px;position:relative;display:flex;flex-direction:column;width:100%;max-width:400px;pointer-events:auto;outline:0;transition:all .4s ease-in-out}.openQRCode .modal-body{padding:1rem}.openQRCode .modal-body>a{display:block;color:#fff!important;background-color:#fff;padding:15px;letter-spacing:.15px;border-radius:10px;font-weight:700;cursor:pointer;font-size:18px;line-height:30px}.openQRCode .modal-header{border:none;height:70px;flex-direction:row-reverse}.openQRCode .modal-header a{width:calc(100% - 50px);height:90%;padding-right:36px;flex:1 1;display:flex;flex-direction:column;align-items:center;justify-content:center}.openQRCode .modal-header a img{height:90%}.openQRCode .modal-header button.close{display:flex;width:35px;height:35px;background-color:hsla(0,0%,100%,.4);border-radius:50%;margin:0;padding:0}.openQRCode .modal-header button.close span{text-shadow:none;width:100%;height:100%;font-weight:400;font-size:30px}.openQRCode .modal-header button.close span.sr-only{display:none}.openQRCode .modal-body{display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;padding-top:0}.openQRCode .modal-body a{margin:0 0 1rem}.openQRCode .modal-footer{border:none}.homepage{height:100%;margin:0 5%;padding-top:6rem}.homepage-title{font-size:70px;font-weight:700;display:flex;flex-direction:row;color:#000}.homepage-title-tm{font-size:30px;margin-top:2rem}.homepage-title__wrapper{display:flex;flex-direction:column;text-align:left;margin:32% 10% 0}.homepage-subtitle{color:#7b7f9e}.homepage .homepage-call-to-action__wrapper{display:flex;flex-direction:row;margin-top:4rem;margin-bottom:4rem}.homepage .tapy-brand{margin-left:.75rem}.socials__wrapper{display:flex;flex-direction:row;align-items:center;justify-content:center;padding:4rem 0}.socials__wrapper a{margin:0 2rem}.socials__wrapper a path,.socials__wrapper a svg{fill:#fff}.tapy-brand{display:flex;flex-direction:column;text-align:left;margin:2rem 0}.tapy-brand-title__wrapper{font-size:70px;font-weight:700;display:flex;flex-direction:row;color:#fff}.tapy-brand-title-tm{font-size:24px;margin-top:2.25rem}.tapy-brand-subtitle{color:#7b7f9e}.sign-in__btn{background-color:#567df4;color:#fff;display:flex;align-items:center;justify-content:center;padding:1rem 0!important;border-radius:12px!important;width:48%;margin-right:.75rem!important}.sign-in__btn svg{margin-left:15px}.register__btn{padding:1rem 0;border-radius:12px;text-decoration:none;background-color:rgba(86,125,244,.1);color:#567df4;align-items:center;width:48%}.login__wrapper,.register__btn{display:flex;justify-content:center}.login__wrapper{flex-direction:column;align-items:stretch;height:100vh}.login__wrapper input{color:#d3d3d3;background-color:#464646!important;border-radius:6px!important;border-width:2px!important;overflow:hidden;transition:all .3s ease-in-out}.login__wrapper input:focus{color:#d3d3d3!important;box-shadow:none;border:2px double transparent;border-radius:6px!important;background-image:linear-gradient(#464646,#464646),linear-gradient(180deg,#567df4,#6200ee);background-origin:border-box;background-clip:padding-box,border-box}.login__wrapper .form-control{height:3rem}.login__wrapper .input-group-append{padding:10px;position:absolute;right:0;height:100%;z-index:10}.login__welcome-back{margin-bottom:2rem;font-size:25px;font-weight:400}.login-call-to-action__wrapper{display:flex;flex-direction:row;margin-top:1.5rem;margin-bottom:.5rem}.login-call-to-action__wrapper a{width:50%}.forgot-password{font-style:italic;color:#848484;padding-top:1rem;width:100%!important;display:flex;align-items:center;justify-content:center}.no-account__wrapper{margin-top:4rem}.no-account__wrapper .no-account{color:#848484}.border-gradient{border-image-slice:1;border:5px solid;border-image-source:linear-gradient(180deg,#567df4,#6200ee)}.border-gradient-purple{border-image-source:linear-gradient(180deg,#567df4,#6200ee)}.register-page{margin:0 5%;padding:calc(70px + 2rem) 25px 2rem}.register-page-description{display:flex;flex-direction:column;margin-bottom:1.5rem}.register-page-description-title{font-size:26px;font-weight:500;color:#fff}.register-page-description-subtitle{font-size:14px;color:#fff}.register-page .register-form input{color:#d3d3d3;background-color:#464646!important;border-radius:6px!important;border-width:2px!important;overflow:hidden;transition:all .3s ease-in-out}.register-page .register-form input:focus{color:#d3d3d3!important;box-shadow:none;border:2px double transparent;border-radius:6px!important;background-image:linear-gradient(#464646,#464646),linear-gradient(180deg,#567df4,#6200ee);background-origin:border-box;background-clip:padding-box,border-box}.register-page .register-form .input-group-append{padding:10px;position:absolute;right:0;height:100%;z-index:10}.register-page label{margin-bottom:5px!important}.register-page input{height:3rem}.register-page .register-page-create-account__btn__wrapper{display:flex;justify-content:center;align-items:center}.register-page .register-page-create-account__btn__wrapper .register-create-account{background-color:#567df4;color:#fff;display:flex;align-items:center;justify-content:center;padding:1rem 0;border-radius:12px;text-decoration:none;width:48%;margin-right:.75rem;cursor:pointer}.register-page .register-page-create-account__btn__wrapper .register-create-account svg{margin-left:10px}.register-page .disclaimer{padding-top:.75rem}.register-page .disclaimer .disclaimer-content{color:#fff;font-size:14px}.register-page .disclaimer .disclaimer-content>input{height:auto!important}.register-page .disclaimer .disclaimer-content .italic{font-style:italic}.edit-profile-page{padding-top:calc(70px + 2rem);padding-bottom:50px;min-height:100vh}.edit-profile-page__view{color:#fff!important;border:2px solid #fff;padding:.5rem 1rem;line-height:1.5;text-align:center;vertical-align:middle;border-radius:.25rem}.edit-profile-page form button{border:none!important}.edit-profile-page input{background-color:#353535;color:#fff;border:none}.edit-profile-page-header{font-weight:700;font-size:25px;line-height:154.3%;display:flex;justify-content:space-between;width:100%}.edit-profile-page-header>a{font-size:13px;color:#383838}.edit-profile-header{margin-bottom:1rem;margin-top:1rem;padding-top:1rem;border-top:1px solid grey}.edit-base-profile,.edit-profile-header{display:flex;align-items:center}.edit-profile__img{width:100px;height:100px;margin-right:.5rem;position:relative}.edit-profile__img .avatar-preloader{width:100%;height:100%;background-size:60% 60%;background-position:50%;background-repeat:no-repeat;position:absolute;top:0;left:0;z-index:0;-webkit-animation:spinX 2s infinite;animation:spinX 2s infinite}.edit-profile__img>img{position:absolute;z-index:2}.edit-profile-edit-contact-card__btn{background-color:#383838!important;border-radius:10px!important;padding-top:.5rem!important;padding-bottom:.5rem!important}.edit-profile-edit-contact-card__btn.profile__btn{position:-webkit-sticky;position:-moz-sticky;position:-o-sticky;position:-ms-sticky;position:sticky;bottom:1.5rem;left:50vw;-webkit-transform:translateX(-17%);transform:translateX(-17%);z-index:1000}.edit-profile-edit-contact-card__btn{width:75%}.contact-card-section{display:flex;flex-direction:column;align-items:center;justify-content:center}.add-new-tapy__form input{color:#d3d3d3}.edit-contact-card__wrapper{display:flex;flex-direction:row}.enable-contact-card__btn{font-weight:700;margin-right:.5rem}.add-profile-prompt{display:flex;flex-direction:row;margin:10px 0;position:relative}.add-profile-prompt .add-profile-prompt-icon{position:absolute;-webkit-transform:translateX(10px);transform:translateX(10px);z-index:9}.add-profile-wrapper{padding-top:1rem;border-top:1px solid grey}.add-profile-header{font-weight:700;font-size:16px;line-height:24px;margin-left:20px}.socials-select::-ms-expand{display:none}.socials-select{position:relative;top:2.5px;-webkit-appearance:none;appearance:none;border:none;width:100%;margin:0 20px}.socials-select .dropdown-menu{width:100%;height:540px;overflow:overlay}.socials-select .dropdown-toggle{background-color:#fff!important;padding:5px 10px 5px 40px!important;color:#000!important;width:100%;display:flex;align-items:center}.socials-select .dropdown-toggle>span{width:calc(100% - 20px)}.socials-select .dropdown-toggle:focus{box-shadow:none!important}.socials-select .dropdown-toggle[aria-expanded=true]>svg{-webkit-transform:translateX(-25%) rotate(135deg);transform:translateX(-25%) rotate(135deg)}.socials-select .dropdown-toggle>svg{position:absolute;left:0;-webkit-transform:translateX(-25%) rotate(0deg);transform:translateX(-25%) rotate(0deg);transition:all .3s ease-in-out}.socials-select .dropdown-toggle:after{display:none}.save-profile__wrapper{display:flex;flex-direction:column;justify-content:center;align-items:center}.save-profile__wrapper button{margin:10px 0;background-color:#383838!important;border-radius:10px!important}.photo-name-upload{width:calc(100% - 100px - 1rem)}.edit-profile-bio__wrapper label{font-weight:700;font-size:16px;line-height:24px}.edit-profile-bio__wrapper textarea{background-color:#353535;border:none;color:#fff;border-radius:10px}.edit-profile-bio__wrapper textarea:focus{background-color:#353535;color:#fff}@-webkit-keyframes spinX{0%{-webkit-transform:rotate(0deg);-webkit-transform-origin:50% 50%}to{-webkit-transform:rotate(1turn);-webkit-transform-origin:50% 50%}}@keyframes spinX{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg);-webkit-transform-origin:50% 50%;transform-origin:50% 50%}to{-webkit-transform:rotate(1turn);transform:rotate(1turn);-webkit-transform-origin:50% 50%;transform-origin:50% 50%}}.edit-social{display:flex;flex-direction:row;align-items:center}.edit-social-icon{height:40px}.edit-social-delete__wrapper{max-width:50px;display:flex;align-items:center;z-index:100;cursor:pointer!important}.edit-social-delete__wrapper span{font-size:30px}.edit-social-title{position:relative;left:10px}.edit-social-icon__wrapper{position:relative;margin:10px;display:flex;align-items:center}.edit-social-column{display:flex;flex-direction:column;margin-bottom:.5rem}.edit-social-arrows{display:flex;flex-direction:column;justify-content:center}.edit-social-input__wrapper{width:100%;align-items:stretch;margin:10px 0}#websiteUrl{margin-top:10px}.edit-social-input__wrapper input{color:#d3d3d3;background-color:#464646!important;border-radius:6px!important;border-width:2px!important;overflow:hidden;transition:all .3s ease-in-out}.edit-social-input__wrapper input:focus{color:#d3d3d3!important;box-shadow:none;border:2px double transparent;border-radius:6px!important;background-image:linear-gradient(#464646,#464646),linear-gradient(180deg,#567df4,#6200ee);background-origin:border-box;background-clip:padding-box,border-box}.edit-contact-card__form .add-information-field__btn{width:100%;border-radius:10px;background-color:#383838;margin:1rem 0;display:flex;flex-direction:row;align-items:center;border:none!important}.edit-contact-card__form .add-information-field__btn svg{margin-right:12%}.edit-contact-card__form .form-group label{margin-bottom:.1rem}.edit-contact-card-btn__wrapper{display:flex;flex-direction:column;padding:2rem;background-color:#272727}.edit-contact-card-btn__wrapper button{margin-bottom:1rem;border-radius:10px;font-weight:500;background-color:#383838;border:none!important}.edit-contact-card-content{padding:1rem 2rem 0;background-color:#272727;color:#fff}.edit-contact-card-content input{background-color:#464646!important;color:#fff;border:2px solid #d3d3d3;border-radius:.25rem}.edit-contact-card-content input:focus{color:#d3d3d3;background-color:#464646!important;border:2px solid #383838}.remove-field{color:#fff;border-radius:50%}.info-field-wrapper{display:flex;flex-direction:row;align-items:center}.info-field-wrapper svg{margin-left:10px}.react-datepicker-wrapper,.react-datepicker__input-container{height:calc(1.5em + .75rem + 2px)}.react-datepicker-wrapper input,.react-datepicker__input-container input{height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem}.remove-field{margin-left:9px}.edit-contact-card-security{display:flex;flex-direction:column}.edit-contact-card-security .security-optional{margin-left:1rem;font-size:12px}.edit-contact-card-security .secure-contact-card{font-size:14px}.edit-contact-card .modal-header{background-color:#272727;padding:.25rem 1rem;border:none}.edit-contact-card .modal-header button{color:#fff;opacity:1;margin:0!important;padding:.5rem!important;color:#000}.edit-contact-card .modal-header button span:first-child{text-shadow:none;width:35px;height:35px;font-weight:400;font-size:30px;background-color:hsla(0,0%,100%,.4);border-radius:50%;display:block}.edit-contact-card .modal-dialog{border:3px solid #383838;border-radius:20px;overflow:hidden}.optional-security-input{display:flex;flex-direction:row;margin-top:.5rem}.optional-security-input input{width:50%;border-radius:.25rem}.optional-security-input div{display:flex;align-items:center;justify-content:center;width:50%}.toggle-container{align-items:stretch;color:red}.toggle-container .active{color:rgba(55,255,171,.92)}.toggle-container span{font-size:.85rem}.toggle-container .switch{position:relative;display:inline-block;width:39px;height:20px;background-color:red;border-radius:20px;transition:all .3s}.toggle-container .switch:after{content:"";position:absolute;width:18px;height:18px;border-radius:50%;background-color:#fff;top:1px;left:1px;transition:all .3s}.toggle-container .checkbox:checked+.switch:after{left:20px}.toggle-container .checkbox:checked+.switch{background-color:rgba(55,255,171,.92)}.toggle-container .checkbox{display:none}.add-information-field .modal-header{background-color:#272727;padding:.25rem 1rem;border:none;border-radius:18px 18px 0 0}.add-information-field .modal-header button{color:#fff;opacity:1}.add-information-field .modal-content{border-radius:20px;border:3px solid #383838}.add-information-field-options{display:flex;flex-direction:column;padding:1rem;background-color:#272727;color:#fff;border-radius:0 0 18px 18px}.add-information-field-options span{margin:.75rem 0;display:flex;align-items:center}.add-information-field-options svg{height:1.5rem}#lottie{background-color:#151515!important;width:100vw;height:100vh;padding:20vh 20vw;display:block;position:fixed;top:0;left:0;overflow:hidden;-webkit-transform:translateZ(0);transform:translateZ(0);text-align:center;opacity:1;z-index:1001}.edit-profile-upload-photo__btn{margin-top:.5rem;background-color:#383838!important;border-radius:10px!important}.image-upload-input{display:none}.theme-editor{background-color:#353535!important;border-radius:12px!important;color:#fff!important;font-weight:400!important;width:100%}.theme-editor .theme-selector{overflow-y:hidden;overflow-x:auto;white-space:nowrap}.theme-editor .theme-selector .theme-block-select{width:85px;height:100px;display:inline-block;text-align:center;margin:1rem 1.25rem 25px 5px}.theme-editor .theme-selector .theme-block-select.current button{border:3px solid #383838!important}.theme-editor .theme-selector .theme-block-select button{display:block;width:100%;height:100%;box-shadow:none;border-radius:12px}.theme-editor .theme-selector .theme-block-select button:focus{box-shadow:none}.theme-editor .theme-selector .theme-block-select button.theme-dark{background-color:#272727}.theme-editor .theme-selector .theme-block-select button.theme-light{background-color:#fff}.theme-editor .theme-selector .theme-block-select label{width:100%}.theme-editor .card-title{font-weight:400!important}.theme-editor .card-title span{white-space:nowrap;line-height:35px}.theme-editor .card-title .toggle-container{margin:0!important}.theme-editor .card-title .toggle-container.light .switch{background-color:#fff;color:#272727}.theme-editor .card-title .toggle-container.light .switch:after{background-color:#d9d9d9}.theme-editor .card-title .toggle-container.dark .switch{background-color:#000;color:#fff}.theme-editor .card-title .toggle-container.dark .switch:after{background-color:#272727}.theme-editor .card-title .toggle-container .switch{width:100px;height:35px;padding-left:35px;line-height:35px;text-align:center}.theme-editor .card-title .toggle-container .switch:after{height:35px;width:35px;border:2px solid grey;top:0;left:0}.edit-profile-page{display:flex;flex-direction:column}.edit-profile-page.profile-page{padding:0}.edit-profile-page.profile-page.light{background-color:#d9d9d9}.edit-profile-page.profile-page.light .container{border-radius:12px;background-color:#d9d9d9;color:#000;font-weight:700;background-color:#ededed;color:#272727!important;border:1px solid #fff;border-bottom:3px solid #3b2c2c}.edit-profile-page.profile-page.light .profile-declaration{color:#272727!important}.edit-profile-page.profile-page.light .profile-name{color:#4a4a4a}.edit-profile-page.profile-page.light .profile-social-username{color:#4a4a4a;font-weight:700}.edit-profile-page.profile-page.dark{background-color:#19191f}.edit-profile-page.profile-page.dark .container{background-color:#000!important;border-color:#fff}.edit-profile-page.profile-page.dark .profile-social{background-color:#0e0e0e!important;border-radius:12px}.edit-profile-page.profile-page .container{border:none;border-bottom:3px solid #383838;border-radius:0 0 12px 12px;margin-bottom:1rem;padding-top:calc(50px + 2rem)}.edit-profile-page .container .profile-bio{white-space:pre-line;margin-bottom:.5rem}.edit-profile-page .container .profile-basic-info{width:calc(100% - 1rem - 100px)}.edit-profile-page .container .profile-basic-info .form-group{display:flex;flex-direction:column;margin-bottom:0}.edit-profile-page .container .profile-basic-info .form-group .profile-name{font-size:30px;font-weight:700;display:flex;align-items:baseline;justify-content:space-between}.edit-profile-page .container .profile-basic-info .form-group .edit-profile-upload-photo__btn{width:100%;height:35px;margin:0;position:relative;display:block;color:#fff}.edit-profile-page .social-items__container{flex:1 1}.edit-profile-page .social-items__container .edit-social-media-profiles{padding:.5rem 1.25rem}.edit-profile-page .profile-declaration{padding-left:15px;padding-right:15px;text-align:center;font-size:12px;margin-bottom:50px}.edit-profile-page .tapy-upsell{width:100vw;max-width:500px;height:50px;margin:0;display:block;color:#fff;background-color:#383838!important;position:fixed;text-align:center;text-decoration:none;font-size:18px;line-height:2.5;z-index:1000;transition:all .4s ease-in-out;border-radius:12px 12px 0 0}.edit-profile-page .tapy-upsell.show{bottom:0}.edit-profile-page .tapy-upsell.hide{bottom:-50px}.social-items__container .profile-social{display:flex;align-items:center;color:#fff;text-decoration:none!important;padding:5px}.social-items__container .profile-social:hover{color:#fff!important}.social-items__container .profile-social-img{width:50px}.social-items__container .profile-social-username__wrapper{padding:0 calc(1rem + 25px) 0 1rem;flex:1 1;text-align:center}.social-items__container .profile-social-username__wrapper span{font-size:22px;font-weight:500}.social-items__container .profile-social .profile-social-username__wrapper{max-width:calc(100% - 50px - 1rem)}.social-items__container .profile-social .profile-social-username__wrapper .profile-social-username{overflow-wrap:break-word}.social-items__container.light .profile-social{border:1px solid #fff;border-radius:12px;background-color:#d9d9d9;color:#000;font-weight:700;background-color:#ededed}.social-items__container.dark .profile-social{border:1px solid #000;background-color:#0e0e0e}.add-contact-card-modal{display:flex;flex-direction:column}.add-contact-card-modal .modal-dialog{margin-top:19%;background-color:#272727;border:3px solid #383838!important;border-radius:12px}.add-contact-card-modal .modal-header{background-color:#272727;border:none;padding:.25rem 1rem!important}.add-contact-card-modal .modal-header .close{color:#fff}.add-contact-card-modal .add-contact-card__modal{background-color:#272727;color:#fff}.add-contact-card-modal .add-contact-card__modal__form{display:flex;flex-direction:column;justify-content:center;align-items:center;padding:1rem}.add-contact-card-modal .add-contact-card__modal__form .form-control{width:48%;margin:1rem 0;border-radius:0}.add-contact-card-modal .add-contact-card__modal__form .contact-card-secure-header{font-size:20px}.add-contact-card-modal .add-contact-card__modal__form .contact-card-digit-prompt{font-size:14px}.add-contact-card-modal .add-contact-card__modal__form button{width:60%;background-color:#383838;border-radius:10px}.contact-card__modal{background-color:#272727;color:#fff}.contact-card__entry label b{color:#fff!important}.not-found{display:flex;flex-direction:column;padding:calc(70px + 2rem) 2rem 2rem}.not-found__header{font-size:30px;font-weight:500}.reset-password{padding:6rem 2rem}.reset-password__form{display:flex;flex-direction:column}.reset-password__form button{margin-top:1rem;width:50%;border-radius:12px;height:3.25rem;background-color:#567df4}.reset-password__form span{margin-bottom:.75rem}.reset-password__form input{color:#d3d3d3;background-color:#464646!important;border-radius:6px!important;border-width:2px!important;overflow:hidden;transition:all .3s ease-in-out}.reset-password__form input:focus{color:#d3d3d3!important;box-shadow:none;border:2px double transparent;border-radius:6px!important;background-image:linear-gradient(#464646,#464646),linear-gradient(180deg,#567df4,#6200ee);background-origin:border-box;background-clip:padding-box,border-box}.reset-password__label{font-size:20px;font-weight:500}.reset-password__username{font-size:14px}.reset-password__links{display:flex}.reset-password__links button{width:100%}.reset-password__links a{width:100%;margin-top:1rem}.reset-password__back{margin-top:5rem;width:100%;height:3.25rem;border-radius:12px!important}.reset-password__back svg{margin-right:1rem}.reset-password__back{background-color:rgba(86,125,244,.1)!important;border:none!important;color:#567df4!important}.reset-password__username{margin:1rem 0}.reset-password .input-group-append{padding:10px;position:absolute;right:0;height:100%;z-index:10}.tapy-activation{padding:calc(70px + 2rem) 2rem 2rem;display:flex;flex-direction:column}.tapy-activation__header{font-size:20px;font-weight:500}.tapy-activation__subheader{font-size:13px}.tapy-activation__serial-number{margin-top:1rem;font-size:13px;color:#848484}.tapy-activation__buttons{display:flex;flex-direction:column;justify-content:center;align-items:center;margin-top:5rem}.tapy-activation__buttons button{width:80%;margin-bottom:2rem;height:55px;border-radius:10px;padding-left:0;padding-right:0}.tapy-activation__new-account{background-color:#567df4!important}.tapy-activation__existing-account{background-color:#555c72!important;border:3px solid #567df4!important}.account-settings{padding:6rem 2rem 3rem}.account-settings__header{font-size:20px;font-weight:500}.account-settings__account-form{padding-bottom:2rem;padding-top:1rem}.account-settings__account-form input{color:#d3d3d3;background-color:#464646!important;border-radius:6px!important;border-width:2px!important;overflow:hidden;transition:all .3s ease-in-out;margin-bottom:1rem}.account-settings__account-form input:focus{color:#d3d3d3!important;box-shadow:none;border:2px double transparent;border-radius:6px!important;background-image:linear-gradient(#464646,#464646),linear-gradient(180deg,#567df4,#6200ee);background-origin:border-box;background-clip:padding-box,border-box}.account-settings__account-form button{margin-top:.5rem;font-size:14px;width:12rem;border-radius:10px;height:3rem;background-color:#383838}.account-settings__account-link{display:block;width:100%;text-align:right}.add-new-tapy__modal .modal-dialog{border:3px solid #383838!important;border-radius:25px!important}.add-new-tapy__modal .modal-header{background-color:#141414;border:none;padding:.25rem 1rem;border-radius:20px 20px 0 0}.add-new-tapy__modal .modal-header button{color:#fff;opacity:1}.add-new-tapy__modal .modal-content{border-radius:25px}.add-new-tapy__form{display:flex;flex-direction:column;margin-bottom:1rem}.add-new-tapy__form input{border:2px solid #d3d3d3;background-color:#464646!important}.add-new-tapy__form input:focus{color:#d3d3d3!important;border:2px solid #383838;background-color:#464646!important}.add-new-tapy__form label{margin-bottom:.25rem}.add-new-tapy .modal-dialog{background-color:#141414}.add-new-tapy__header{font-size:22px;font-weight:700;margin-bottom:.5rem}.add-new-tapy-content{padding:1.5rem;background-color:#141414;color:#fff;border-radius:0 0 20px 20px}.add-new-tapy-serial-number{display:flex;flex-direction:row;justify-content:space-between;align-items:center;margin-top:1rem}.add-new-tapy-serial-number button{height:2.5rem;font-weight:700;position:relative;top:6px;background-color:#383838;letter-spacing:1px;font-size:14px;border:none!important}.add-new-tapy-serial-number button svg{width:1.5rem;margin-right:.5rem}.add-new-tapy-serial-number label{margin-bottom:.25rem}.add-new-tapy-serial-number .form-group{width:48%}.your-tapys{display:flex;flex-direction:column}.your-tapys__header{margin-bottom:.5rem;font-weight:300}.your-tapys .tapy-card-entry{display:flex;justify-content:space-between;padding:0 .5rem}.your-tapys .tapy-card-entry svg{background-color:#000;margin-left:3rem}.your-tapys .purchase-tapy a{text-decoration:none;color:#6c757d!important}.remove-tapy-button__wrapper{display:flex;justify-content:center;align-items:center}.remove-tapy-button__wrapper button{margin:0 1rem;width:6rem;text-transform:uppercase;padding:0 .25rem;letter-spacing:1px}.remove-tapy-button__wrapper .remove-tapy-btn{background-color:#eb5757;border:1px solid #eb5757}.remove-tapy-button__wrapper .cancel-tapy-btn{background-color:#fff;border:1px solid #575757;color:#575757}.remove-tapy__wrapper{border:1px solid red;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:.5rem;border-radius:6px}.remove-tapy__wrapper span{font-size:14px;margin-bottom:.5rem}



        /*--------------------------------------------------------------------------------------------------------------------------------------------------------- */




        .vCard,html{overflow:hidden}.banner-image,.qr-code img,.vCard{width:100%}:root{--text-primary:#252429;--theme-bg:#F7762E;--theme-bg-dark:#d36023;--theme-hover:#d36023;--theme-bg-light:#ffd2b9;--color-primary-alt:#505CFD;--color-secondary:#00D09C;--color-tertiary:#FFCD3E;--color-extra08:#49CCFF;--color-success:#3EB75E;--color-danger:#FF0003;--extra04-color:#00CFFF;--color-body:#9D9D9D;--color-p:#9D9D9D;--heading-color:#000248;--color-white:#fff;--bg-grey:#EFEFEF;--inherit:inherit}button:focus{outline:0}nav ol,nav ul{list-style:none}.date-input input{font-size:20px;font-weight:500;padding:16px 20px;border:none;display:block;width:100%;box-sizing:border-box;margin:0;height:60px;border-radius:10px;background-color:var(--bg-grey);color:var(--text-primary)}.date-input input::placeholder{font-family:inherit;font-style:normal;font-weight:500;font-size:20px;line-height:30px;text-align:center;color:var(--text-primary)}.date-input input:focus-visible{outline:0}.pl-8{padding-left:8px!important}.pr-8{padding-right:8px!important}.pb-20{padding-bottom:20px!important}@font-face{font-family:inherit;font-weight:700;font-style:normal;font-display:swap}*{-webkit-box-sizing:border-box;box-sizing:border-box}html{overflow-y:auto}.theme_body{overflow-x:hidden;font-size:16px;line-height:26px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;color:#757589;font-weight:400;font-family:inherit!important;background-color:#fff;min-height:100vh}.vcard-description p{font-style:normal;font-weight:500;font-size:16px;line-height:20px;color:#9d9d9d}.contact-text h3,.contact-text h4{color:var(--text-primary);margin:0}.white-section{margin:20px 15px;border-radius:20px;padding:20px 10px}ul{padding:0;margin:0}.modal-open .modal,.theme_body.modal-open{padding-right:0!important}.banner-image{background-size:cover;background-repeat:no-repeat;position:relative;border-radius:0 0 60px 60px;padding:0}.cover:before{content:'';background:linear-gradient(to top,rgba(49,49,49,.33),rgba(189,189,189,0));position:absolute;bottom:0;left:0;right:0;top:30%}.wrapper{display:flex;justify-content:center;align-items:center;flex-direction:column;min-height:100vh;background:var(--bg-grey)}.vCard{background-color:#eeedef;border-radius:0;max-width:576px;min-width:576px;box-shadow:1px 1px 25px 0 rgba(88,88,88,.35)}.vCard .profile .img-thumbnail{width:180px;height:180px;object-fit:cover;border-radius:50%;padding:0;border:4px solid #fff;margin:0}.image-icon,.qr-code{display:flex;align-items:center;border-radius:50%}.qr-code{height:100px;width:100px;text-align:center;justify-content:center;position:absolute;right:50px}.picker,fieldset{position:relative}.contact_section .image-icon{background:#efefef;box-shadow:0 4px 13px rgb(0 0 0 / 6%);border-radius:5px;margin:0 auto}.contact_section .contact-text p{font-family:inherit;font-style:normal;font-weight:500;font-size:15px;text-align:center;color:#9d9d9d;padding:12px 0 0;margin:0}.image-icon{box-sizing:border-box;height:60px;width:60px;justify-content:center;margin-right:10px}.contact-icon{text-align:center;margin:0 auto}.contact-text h3{font-size:28px}.contact-text h4{font-size:35px}.contact-text h3 span{font-weight:400}.image-icon img{width:30px}.contact_section ul{list-style:none;padding:0;margin:0}.card-detail.card-business-date{background:linear-gradient(180deg,rgba(196,196,196,0) 0,rgb(236 236 236 / 32%) 100%)}.card-business-hours ul li{list-style:none;margin:0;padding:0 40px 0 20px;width:50%;float:left}.card-business-hours ul li p{text-align:left;font-size:16px;color:var(--color-p);margin:0 0 6px;font-weight:500}.card-contact{padding:30px 20px 20px}.vcard-description{color:#222;padding:10px 30px}.vcard-description h1{font-size:50px}.vcard-description h6{font-size:25px;margin:12px 0}.section-line{margin:0 30px;width:40%;border-bottom:2px solid var(--border-color)}.card-business-hours{width:100%;display:inline-block;position:relative}.card-detail{padding:10px 0 0}.card-business-hours .business-hours-image h3{margin:0 15px}.card-business-hours-main{display:flex}.card-business-hours ul{width:100%;float:left;margin-bottom:10px}.business-hours-image img{max-width:45px}.card-business-hours h4{font-size:20px;color:var(--color-white);margin:0 0 20px}.card-business-hours h3{font-size:40px;color:var(--text-primary);margin:0 0 20px;font-weight:400}.card-business-hours h3 span{font-weight:500}fieldset{margin:1em 0;border:0;padding:0}input:focus{border-color:#0089ec}a{color:#0089ec;text-decoration:none}a:hover{text-decoration:underline}.whitespace:before{content:"...some content here...";color:#ccc;background:#f5f5f5;margin:1em 0;padding:5em 0;font-weight:700;font-size:1.5em;letter-spacing:2px;text-align:center;display:block;text-transform:uppercase}.picker{font-size:16px;text-align:left;line-height:1.2;color:#000;z-index:10000;width:100%}.picker__input.picker__input--active{border-color:#fbd395}.picker__holder{width:100%;overflow-y:auto;-webkit-overflow-scrolling:touch;position:absolute;background:#fff;border:1px solid #aaa;border-top:0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-border-radius:0 0 6px 6px;-moz-border-radius:0 0 6px 6px;border-radius:0 0 6px 6px;max-height:0;-ms-filter:"alpha(Opacity=0)";-moz-opacity:0;opacity:0;-webkit-transform:translateY(-1em) perspective(600px) rotateX(10deg);-moz-transform:translateY(-1em) perspective(600px) rotateX(10deg);transform:translateY(-1em) perspective(600px) rotateX(10deg);-webkit-transition:.15s ease-out,max-height 0 .15s;-moz-transition:.15s ease-out,max-height 0 .15s;transition:.15s ease-out,max-height 0 .15s}.picker--opened .picker__holder{max-height:25em;-ms-filter:"alpha(Opacity=100)";-moz-opacity:1;opacity:1;-webkit-transform:translateY(0) perspective(600px) rotateX(0);-moz-transform:translateY(0) perspective(600px) rotateX(0);transform:translateY(0) perspective(600px) rotateX(0);-webkit-transition:.15s ease-out,max-height 0;-moz-transition:.15s ease-out,max-height 0;transition:.15s ease-out,max-height 0;-webkit-box-shadow:0 6px 18px 1px rgba(0,0,0,.12);-moz-box-shadow:0 6px 18px 1px rgba(0,0,0,.12);box-shadow:0 6px 18px 1px rgba(0,0,0,.12)}.picker__box{padding:0 1em}.picker__header{text-align:center;position:relative;margin:20px 20px 30px}.picker__month,.picker__year{font-weight:500;display:inline-block;margin-left:.25em;margin-right:.25em}.picker__year{color:#999;font-size:.8em;font-style:italic}.picker__select--month,.picker__select--year{font-size:.8em;border:1px solid #b7b7b7;height:2.5em;padding:.66em .25em;margin-left:.25em;margin-right:.25em;margin-top:-.5em}.picker__select--month{width:35%}.picker__select--year{width:22.5%}.picker__select--month:focus,.picker__select--year:focus{border-color:#0089ec}.picker__nav--next,.picker__nav--prev{position:absolute;top:-.33em;padding:.5em 1.33em;width:70px;height:30px}.picker__nav--prev{left:-1em;padding-right:1.5em}.picker__nav--next{right:-1em;padding-left:1.5em}.picker__nav--next:before,.picker__nav--prev:before{content:" ";border-top:.5em solid transparent;border-bottom:.5em solid transparent;border-right:.75em solid var(--theme-bg);width:0;height:0;display:block;margin:0 auto}.picker__nav--next:before{border-right:0;border-left:.75em solid var(--theme-bg)}.picker__button--clear:hover,.picker__button--today:hover,.picker__nav--next:hover,.picker__nav--prev:hover{cursor:pointer;color:#000;background:var(--theme-bg);border-radius:10px}.picker__nav--prev:hover:before{border-right:.75em solid var(--color-white)}.picker__nav--next:hover:before{border-left:.75em solid var(--color-white)}.picker__nav--disabled,.picker__nav--disabled:before,.picker__nav--disabled:before:hover,.picker__nav--disabled:hover{cursor:default;background:0;border-right-color:#f5f5f5;border-left-color:#f5f5f5}.picker__table{text-align:center;border-collapse:collapse;border-spacing:0;table-layout:fixed;font-size:inherit;width:100%;margin-top:.75em;margin-bottom:.5em}.picker__table td{margin:0;padding:0}.picker__weekday{width:14.285714286%;font-size:.75em;padding-bottom:.25em;color:#999;font-weight:500}@media (min-height:26.5em){.picker__table{margin-bottom:.75em}.picker__weekday{padding-bottom:.5em}}.picker__day{padding:.3125em 0;font-weight:200;border:1px solid transparent}.picker__day--today{color:var(--theme-bg);position:relative}.picker__day--highlighted,button.make-an-appointment-btn-main:hover{background:var(--theme-hover)}.picker__day--disabled:before{border-top-color:#aaa}button.picker__button--close{border:none;background:var(--theme-bg);padding:10px 20px;border-radius:10px 10px 0 0}.picker__day--outfocus{color:#ddd;-ms-filter:"alpha(Opacity=66)";-moz-opacity:.66;opacity:.66}.picker__day--infocus:hover,.picker__day--outfocus:hover{cursor:pointer;color:#000;background:var(--theme-hover);border-radius:10px}.picker--focused .picker__day--highlighted,.picker__day--highlighted:hover{background:var(--theme-bg);color:#fff;border-radius:10px}.picker__day--disabled,.picker__day--disabled:hover{background:#f5f5f5;border-color:#f5f5f5;color:#ddd;cursor:default}.picker__footer{text-align:center}.picker__button--clear,.picker__button--today{border:1px solid #fff;background:#fff;font-size:.8em;padding:.66em 0;font-weight:700;width:50%;display:inline-block;vertical-align:bottom}.radio input[type=radio]:checked+.radio-label,.service-card,.star-section{background:var(--theme-bg)}.picker__button--clear:focus,.picker__button--today:focus{background:#b1dcfb;border-color:#0089ec;outline:0}.picker__button--clear:before,.picker__button--today:before{position:relative;display:inline-block;height:0}.radio{margin:.5rem}.radio input[type=radio]{position:absolute;opacity:0}.radio input[type=radio]+.radio-label{content:"";background:#f4f4f4;display:inline-block;width:100%;height:60px;color:#000;position:relative;top:0;vertical-align:top;cursor:pointer;text-align:center;transition:250ms;font-size:20px;line-height:60px;border-radius:10px;padding:0}.radio input[type=radio]:focus+.radio-label:before{outline:0;border-color:#3197ee}.radio input[type=radio]:disabled+.radio-label:before{box-shadow:inset 0 0 0 4px #f4f4f4;border-color:#b4b4b4;background:#b4b4b4}.radio input[type=radio]+.radio-label:empty:before{margin-right:0}.lable-custom{width:20%;float:left}.radio-custom{width:80%;float:left}.radio-custom .radio{width:50%;float:left;padding:5px 0;margin:0}.rdzfhf{padding:0 10px}button.make-an-appointment-btn-main img.img-fluid{width:100%;max-width:20px}.appointment-lable{font-weight:500;font-size:25px;color:white}.make-an-appointment-btn{width:80%;float:left;margin-top:15px}button.make-an-appointment-btn-main{padding:10px 0;border:none;background:var(--theme-bg);border-radius:10px;transition:.5s;height:50px}button.make-an-appointment-btn-main h4{margin:0 0 0 15px}.service-card{padding:30px 20px;border-radius:10px;margin-bottom:10px}.service-card-img{width:40px;height:40px;display:flex;align-items:center;justify-content:center;margin:0 auto 30px;overflow:hidden}.service-card-img img{width:100%;max-width:80px;height:100%;object-fit:cover}.service-card-heading h3{font-weight:700;font-size:25px;text-align:center;color:var(--text-primary);margin:25px 0 0}.service-card-heading p{color:var(--text-primary);font-weight:500;font-size:13px;text-align:center;line-height:20px}.service-link a{color:#fff;font-weight:700;font-size:20px;display:flex;align-items:center;justify-content:center}.text p,h4.modal-title{color:var(--text-primary);text-align:center}.service-link a img{width:100%;max-width:20px;margin-left:8px}.service-card.testimonials-card{background:0 0}.service-card.testimonials-card .service-card-img{width:120px;height:120px;overflow:hidden}.service-card.testimonials-card .service-card-img img{width:100%;max-width:120px;height:100%;object-fit:cover}.service-card.testimonials-card .service-card-heading p{font-weight:500;font-size:15px;text-align:center;line-height:21px}.star-section{margin:10px 0 20px;-webkit-background-clip:text;-moz-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}.star-section svg{width:15px;margin:0 5px}.star-section i.fas.fa-star,.star_color i{font-size:15px;margin:0 5px}.text p,button.share-card-btn-main{margin:0 auto 50px;font-family:inherit;font-style:normal}.appointment-modal .modal-dialog,.qr-modal .modal-dialog{max-width:576px;min-width:320px;margin:0 auto}.appointment-modal .modal-content,.qr-modal .modal-content{max-width:576px;min-width:320px;overflow:hidden;width:100%;box-shadow:1px 1px 25px 0 rgb(88 88 88 / 35%);height:auto;margin-top:0;margin-bottom:0}.qr-modal .modal-content{background:#eeedef;border-radius:0;min-height:100vh}.modal.fade.qr-modal .modal-dialog{-webkit-transform:translateX(25%);-ms-transform:translateX(25%);-o-transform:translateX(25%);transform:translateX(25%);-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;transition:transform .3s ease-out,-webkit-transform .3s ease-out,-o-transform .3s ease-out}.modal.in.qr-modal .modal-dialog{-webkit-transform:translateX(0);-ms-transform:translateX(0);-o-transform:translateX(0);transform:translateX(0)}.appointment-modal .modal-content{background:var(--theme-bg);border-radius:15px}.modal.appointment-modal .modal-dialog{padding:15px}button.back-btn{width:30px;height:30px;background:#b7b8b9;box-shadow:0 4.63954px 4.63954px rgb(0 0 0 / 5%);border:none;border-radius:50%}button.logout-btn{background:0 0;border:none}h4.modal-title{font-family:inherit;font-style:normal;font-weight:500;font-size:20px;line-height:18px}.qr-main-image{background:#fff;padding:20px;border-radius:20px;display:inline-block;margin-bottom:50px;position:relative;height:240px;width:240px}.qr-code-border,.qr-main-image img{position:absolute}.qr-code-border{display:inline-block;width:100%;height:100%;left:0;top:0;bottom:0;right:0}img.left-top-border{left:20px;top:20px}img.left-bottom-border{left:20px;bottom:20px}img.right-top-border{right:20px;top:20px}img.right-bottom-border{right:20px;bottom:20px}.modal-body-section{padding:40px 0}.text p{font-weight:500;font-size:22px;line-height:38px;width:65%}button.share-card-btn-main{border:none;background:var(--theme-bg);padding:10px 20px;width:50%;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:18px;line-height:23px;color:var(--color-white)}.form-btn-group,form.appointment-form{border-top:1px solid #fff;padding-top:30px}button.share-card-btn-main img{margin-right:10px}.modal-social-icon-section .image-icon{background:var(--color-white)}button.back-btn img.img-fluid{width:100%;max-width:10px}form.appointment-form .form-group label.col-form-label{color:#000;font-weight:500}form.appointment-form .form-group input.form-control{height:50px;border:none;border-radius:10px;line-height:60px;padding:0 18px;font-weight:500;color:#000;transition:.5s}form.appointment-form .form-group input.form-control:focus{box-shadow:0 13px 20px -10px var(--theme-bg-dark);transition:.5s}.form-btn-group{margin:40px 0;display:flex;align-items:center;justify-content:space-between}button.btn.form-btn--close{background:#d8d8d8;padding:10px 50px;border-radius:9px}.btn.form-btn--submit{background:var(--theme-bg-dark);padding:10px 40px;border-radius:7px;color:#fff;font-weight:700;font-size:16px;transition:.5s}.form-btn-group .btn:focus{outline:0}.btn.form-btn--submit:hover{box-shadow:0 13px 20px -10px var(--theme-bg-dark);transition:.5s}.make-an-appointment{width:38%;padding:0;margin:0 10px}button.border-dark{border:2px solid var(--text-primary)!important}.social-image-icon a{height:60px;transition:.5s;border-radius:4.53849px;width:100%;text-align:center;margin:0 auto;display:flex;align-items:center;justify-content:center;background:#efefef}.social-image-icon a:hover{transform:translateY(-5px);transition:.5s;box-shadow:0 10px 10px -10px var(--theme-bg)}.modal-social-icon-section .image-icon img,.social-image-icon a img,.social-image-icon img.img-fluid{width:100%;max-width:30px}.social-icon .image-icon{margin:20px 0}.social-image-icon,.vcard-branding{margin-bottom:20px}@media only screen and (max-width:1500px){.vCard{max-width:450px;min-width:450px;box-shadow:none}}@media only screen and (max-width:575px){.card-business-hours ul li{padding:0 30px}.vCard{min-width:initial}}@media only screen and (max-width:480px){.vcard-description h1{font-size:28px}.vcard-description h6{font-size:17px;margin:12px 0}.vcard-description p{font-size:14px;line-height:19px}.card-contact{padding:30px 00px 20px}.vCard .profile .img-thumbnail{width:160px;height:160px}.qr-code{position:relative;right:0}.qr-code img{width:100%;max-width:65px}.contact-text h4{font-size:20px}.social-image-icon a{padding:7px 15px;height:50px}button.make-an-appointment-btn-main{padding:10px}.make-an-appointment{width:48%;margin:0 4px}.image-icon{height:45px;width:45px}.image-icon img{width:100%;max-width:24px}.business-hours-image img{max-width:33px}.card-business-hours ul li,.social-icon-main{padding:0}.card-business-hours ul li p{font-size:12px}.card-business-hours h3{font-size:25px;margin:0 0 10px}.card-business-hours{padding:10px 0 0}.contact-text h3{font-size:24px}.appointment-lable{font-size:13px}.lable-custom{width:15%}.make-an-appointment-btn,.radio-custom{width:85%}.date-input input{height:50px}.radio input[type=radio]+.radio-label{height:50px;font-size:15px;line-height:50px}.card-business-hours h4{font-size:14px}.picker__header{margin:20px 0}.res-pr-0{padding-right:0!important}.res-pl-0{padding-left:0!important}.res-pt-0{padding-top:0!important}button.share-card-btn-main{width:70%}.text p{font-size:18px;line-height:31px;width:100%}.btn.form-btn--submit,button.btn.form-btn--close{padding:10px 20px}.social-icon .image-icon{margin:20px 8px}}.qrcode{margin-top:10px}i.star-color{color:var(--theme-bg)}.star_color{margin:10px 0 20px}



        .main-content{
            /*background-image: url("https://wallpaperaccess.com/full/396538.jpg");
            background-size: cover;
            background-position-x: center;*/
            background: #efefef;
        }

        .btn-black{
            background: #3a3a3a;
        }

        .card {
            background: white !important;
        }

        .con{
            margin: 0 0.5em;
        }

        .btn{
            font-weight: 700;
            font-size: 1rem;
        }

        .btn-warning {
            background-color: #ff643a;
            border-color: #ff643a;
        }

        .btn-warning:hover {
            background-color: #ff6a42;
            border-color: #ff6a42;
        }

        .profile-declaration {
            padding-left: 15px;
            padding-right: 15px;
            text-align: center;
            font-size: 12px;
            margin-bottom: 50px;
        }

        .tapy-upsell {
            width: 100%;
            height: 50px;
            color: #fff;
            background-color: #121212 !important;
            text-align: center;
            font-size: 18px;
            line-height: 2.5;
            z-index: 1000;
            transition: all .4s ease-in-out;
            border-radius: 0 0 10px 10px;
        }

        .main-header {
            background-color: #000000b8;
            border-radius: 0 0 5px 5px;
        }

        .css-hboir5 {
            display: flex;
            width: 100%;
        }

        .css-1if8zqo {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 1rem;
            height: 3.5rem;
            width: 3.5rem;
        }

        .css-48v4oc {
            object-fit: contain;
            width: 20px;
            height: 30px;
        }

        .css-hd481m {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            cursor: pointer;
            width: 100%;
            position: relative;
        }

        .css-f3dzr7{
            color: black;
            font-weight: 700;
        }

        .cont-container{
            background: #e0e0e0;
            border-radius: 1em;
        }

        .fat7{
            background: #606060;
        }

        .btn{
            box-shadow: unset;
        }

        .fab{
            font-weight: 100;
        }

        .nav-link {
            color: #f7762e;
        }

        .nav-link:hover {
            color: #ffa16c;
        }

        .fade:not(.show) {
            opacity: unset;
        }

        .modal-dialog{
            margin-top: 5em !important;
        }

        .l-disabled {
            background: #f72e2e !important;
            opacity: 0.5;
        }

        li,ul,span,a,p,h1,h2,h3,h4,h5,h6,div{
            color: #5e5873 !important;
        }
        i,.btn-circle,.tapy-upsell{
            color: white !important;
        }

        .banner-image {
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            width: 100%;
            height: 300px;
            border-radius: 0px 0 60px 60px;
            margin-bottom: 100px;
            padding: 0;
        }

        .banner-image-main {
            width: 100%;
            display: inline-block;
            height: 300px;
            position: relative;
        }

        .banner-image-main img {
            width: 100%;
            border-radius: 20px 20px 70px 70px;
            height: 100%;
            object-fit: cover;
        }

        .profile-head {
            transform: translateY(50%);
            position: absolute;
            top: 10%;
            left: 0;
            right: 0;
        }

        .profile .img-thumbnail {
            width: 10em;
            height: 10em;
            margin-top: 4em;
            object-fit: cover;
            border-radius: 50%;
            padding: 0;
            border: 4px solid #ffffff;
        }

        .justify-content-center{
            margin: 0;
        }

        .media {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
        }

        .img-thumbnail {
            max-width: unset;
        }

        .hide{
            display:none;
        }

        .pt-7, .py-7 {
            padding-top: 2rem !important;
        }

        .pt-md-4, .py-md-4 {
            padding-top: 0 !important;
        }

        .nav-link{
            color: white;
            background-color: #f7762e !important;
            margin: 0 4px;
        }

        .btn-rounded {
            border-radius: 10px !important;
        }

        nav-link:hover {
            color: #ffffff;
        }

        .nav-item{
            margin-top: 1em;
        }

        .form-control{
            background-color: rgb(192 192 192);
        }


        nav {
        .navbar-brand {font-size: 30px;}
        .navbar-toggle {margin: 13px 15px 13px 0;}
        a {
            font-size: 18px;
            padding-bottom: 20px !important;
            padding-top: 20px !important;
            transition: all 0.3s ease;
        }
        }



        nav.navbar.shrink {
            min-height: 35px;
        .navbar-brand {font-size: 25px;}
        a {
            font-size: 15px;
            padding-bottom: 10px !important;
            padding-top: 10px !important;
        }
        .navbar-toggle {
            margin: 8px 15px 8px 0;
            padding: 4px 5px;
        }
        }

        .navbar{
            background: black;
        }

        .navbar-brand {
            position: unset;
            color: white !important;
            display: unset !important;
        }


        .labela{
            float: left;
        }

        .nav-pills .nav-item {
            margin-right: 0;
        }

        .tab-content {
            border:unset;
        }
        #pills-tab {
            border:unset;
        }

        .container-scroller{
            background-image: url(https://tapycard.com/public/assets/profile/img/pattern.svg) !important;
        }


        .custom-control-label::before, .custom-control-label::after{
            opacity: 0;
        }

        .bg-danger{
            border-radius: 0.35em;
        }


        #removeRow_appointment{
            padding-left: 0.8em;
        }


        .btn i, .fc button i, .ajax-upload-dragdrop .ajax-file-upload i, .swal2-modal .swal2-buttonswrapper .swal2-styled i, .swal2-modal .swal2-buttonswrapper .swal2-styled.swal2-confirm i, .swal2-modal .swal2-buttonswrapper .swal2-styled.swal2-cancel i{
            margin-right: 0;
        }

    </style>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/components/input-group/">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/assets/css/docs.min.css" rel="stylesheet">
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div >

            <div >
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body py-5">
                        <center><img class="preloader-logo-icon logo-elem mb-4" style=" width: 10em; opacity: 0.5; " src="{{asset('assets/media/logos/logo.png')}}" alt="Tapycard"></center>
                        <h3 id="headd" class="card-title text-left mb-3">Please Enter Your Secret code</h3>



                        <form  class="auth-register-form mt-2" enctype="multipart/form-data" action="{{ url('ComplateRegister') }}" method="get">
                                @csrf
                                <div class="w-100">

                                    <!--end::Heading-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Code : </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" id="name" class="form-control form-control-lg form-control-solid" name="code" />
                                        <input type="hidden"  class="form-control form-control-lg form-control-solid" name="serial" value="{{$data->serial}}" />
                                        <!--end::Input-->
                                    </div>

                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <br>
                                    <div class="mb-10 fv-row" style="justify-content: center;display: flex">
                                        <button type="submit" class="btn btn-dark " style="color:#FFF; width: 120px ">Send </button>

                                    </div>
                                </div>



                        </form>

                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span><br>
                        @endif
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span><br>
                        @endif
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span><br>
                        @endif
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span><br>
                        @endif
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span><br>
                        @endif
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span><br>
                        @endif
                        @if ($errors->has('language'))
                            <span class="text-danger">{{ $errors->first('language') }}</span><br>
                        @endif
                        @if ($errors->has('profile_url'))
                            <span class="text-danger">{{ $errors->first('profile_url') }}</span><br>
                        @endif
                        @if ($errors->has('terms_agreement'))
                            <span class="text-danger">{{ $errors->first('terms_agreement') }}</span><br>
                        @endif
                        @if ($errors->has('about_title'))
                            <span class="text-danger">{{ $errors->first('about_title') }}</span><br>
                        @endif
                        @if ($errors->has('about_designation'))
                            <span class="text-danger">{{ $errors->first('about_designation') }}</span><br>
                        @endif
                        @if ($errors->has('about_sub_title'))
                            <span class="text-danger">{{ $errors->first('about_sub_title') }}</span><br>
                        @endif
                        @if ($errors->has('about'))
                            <span class="text-danger">{{ $errors->first('about') }}</span><br>
                        @endif
                        @if ($errors->has('img'))
                            <span class="text-danger">{{ $errors->first('img') }}</span><br>
                        @endif
                        @if ($errors->has('cover'))
                            <span class="text-danger">{{ $errors->first('cover') }}</span><br>
                        @endif
                        @if ($errors->has('social_URL'))
                            <span class="text-danger">{{ $errors->first('social_URL') }}</span><br>
                        @endif
                        @if ($errors->has('social_type'))
                            <span class="text-danger">{{ $errors->first('social_type') }}</span><br>
                        @endif
                        @if ($errors->has('video_title'))
                            <span class="text-danger">{{ $errors->first('video_title') }}</span><br>
                        @endif
                        @if ($errors->has('video_URL'))
                            <span class="text-danger">{{ $errors->first('video_URL') }}</span><br>
                        @endif
                        @if ($errors->has('video'))
                            <span class="text-danger">{{ $errors->first('video') }}</span><br>
                        @endif
                        @if ($errors->has('image_title'))
                            <span class="text-danger">{{ $errors->first('image_title') }}</span><br>
                        @endif
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span><br>
                        @endif
                        @if ($errors->has('contact_text'))
                            <span class="text-danger">{{ $errors->first('contact_text') }}</span><br>
                        @endif
                        @if ($errors->has('contact_URL'))
                            <span class="text-danger">{{ $errors->first('contact_URL') }}</span><br>
                        @endif
                        @if ($errors->has('contact_type'))
                            <span class="text-danger">{{ $errors->first('contact_type') }}</span><br>
                        @endif





                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php
    $message = session()->get("message");
    ?>
    @if( session()->has("message"))

    Swal.fire({
        icon: 'error',
        title: 'Sorry',
        text: 'Your Secret Code is Wrong!',
    })

    @endif
</script>

</body>
</html>
