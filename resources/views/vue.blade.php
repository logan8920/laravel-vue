<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
     <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
		<title>{{env("APP_NAME") ?? "Laravel View"}}</title>
		<!-- ===============================================--><!--    Favicons--><!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================--><!--    Stylesheets--><!-- ===============================================-->
    <link rel="stylesheet" href="{{ asset('vendors/swiper/swiper-bundle.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&amp;family=Rubik:ital,wght@0,300..900;1,300..900family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>
    <style>
      iframe html body div#rc-anchor-container {
          width: 361px !important;
      }

      label.error {
            color: red !important;
            font-size: 12px !important;
            font-weight: bolder !important;
      }
      input.error:focus {
            border: 1px solid red !important;
            box-shadow: none !important;
        }
      input.error,select.error,textarea.error{
        border: 1px solid red !important;
        box-shadow: none !important;

      }
    </style>
		@vite("resources/css/app.css")
</head>
<body>
	<!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
	<div id="app"></div>
  <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
  <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendors/is/is.min.js') }}"></script>
  <script src="{{ asset('vendors/countup/countUp.umd.js') }}"></script>
  <script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
  <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('assets/js/additional-methods.min.js')}}"></script>
  <script src="{{ asset('assets/js/form.js') }}"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="{{ asset('assets/js/theme.js') }}"></script>
  <script>
    const baseUrl = "{{request()->root()}}";
  </script>
	@vite("resources/js/app.js")
</body>
</html>