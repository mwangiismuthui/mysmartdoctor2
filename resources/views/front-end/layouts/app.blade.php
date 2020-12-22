<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Find easily a doctor and book online an appointment">
    <meta name="author" content="Ansonika">
    <title>Smart Care Dental || @isset($pageTitle) {{$pageTitle}}@endisset</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('frontEnd') }}/img/logo.jpg" type="image/x-icon">


    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('frontEnd') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontEnd') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontEnd') }}/css/menu.css" rel="stylesheet">
    <link href="{{ asset('frontEnd') }}/css/vendors.css" rel="stylesheet">
    <link href="{{ asset('frontEnd') }}/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('frontEnd') }}/css/custom.css" rel="stylesheet">
    <link href="{{ asset('slider/tinyslide.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
    @stack('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

</head>

<body>

    {{-- <div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div> --}}
    <!-- End Preload -->

    @include('front-end.layouts.parts.nav')
    <!-- /header -->

    <main>
        @yield('content')
    </main>
    <!-- /main content -->

    @include('front-end.layouts.parts.footer')
    <!--/footer-->

    <div id="toTop"></div>
    <!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('frontEnd') }}/js/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('frontEnd') }}/js/common_scripts.min.js"></script>
    <script src="{{ asset('frontEnd') }}/js/functions.js"></script>

    <script src="{{ asset('slider/tinyslide.js') }}"></script>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');

    </script>
    @stack('js')
    <script>
        // image upload js start

        function showMyImage(fileInput, imagePreview) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById(imagePreview);
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function (aImg) {
                    return function (e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
            files = "";
            img = "";
        }

    </script>
</body>

</html>
