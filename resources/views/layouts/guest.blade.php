<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>̣@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png">
    <!-- google font -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="/css/responsive.css">


</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <!-- end search arewa -->
 

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Sign up</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5 px-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="breadcrumb-text">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end copyright -->

    <!-- jquery -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="/js/sticker.js"></script>
    <!-- main js -->
    <script src="/js/main.js"></script>
    @yield('scripts')
</body>

</html>
