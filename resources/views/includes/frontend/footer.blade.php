 <!-- Footer Area Start -->
 <footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img src="{{ asset('asset/shotel/logo1.png') }}" width="300" height="100" alt=""></a>
                        @foreach ($settings as $setting)
                        <h4>{{ $setting->phone }}</h4>
                        <h3><span>Info.{{ $setting->email }} | {{ $setting->instagram }} | {{ $setting->addres }}</span></h3>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="container">
        <div class="copywrite-content">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by GreatHotels</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- Social Info -->

                </div>
            </div>
        </div>
    </div>
</footer>
