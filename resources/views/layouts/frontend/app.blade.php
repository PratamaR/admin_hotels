<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Great Hotel &amp; Resort</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('asset/shotel/logo1.png') }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style.css') }}">

</head>

<body>

    @include('includes.frontend.navbar')

    <!-- Header Area End -->
    <!-- Welcome Area Start -->
@yield('content')

    <!-- Call To Action Area Start -->
    <section class="roberto-cta-area">
        <div class="container">
            <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url({{ asset('frontend/assets/img/bg-img/1.jpg') }});">
                <div class="row align-items-center">
                    @foreach ($settings as $setting )
                    <div class="col-12 col-md-7">
                        <div class="cta-text mb-50">
                            <h2>Contact us now!</h2>
                            <h6>Contact ({{ $setting->phone}}) to book directly or for advice</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 col-md-5 text-right">
                        <a href="#" class="btn roberto-btn mb-50">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    <div class="partner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Area End -->
@include('includes.frontend.footer')

    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- All Plugins -->
    <script src="{{ asset('frontend/assets/js/roberto.bundle.js') }}"></script>
    <!-- Active -->
    <script src="{{ asset('frontend/assets/js/default-assets/active.js') }}"></script>

</body>

</html>
