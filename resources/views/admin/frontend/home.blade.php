@extends('layouts.frontend.app')

@section('content')

<section class="welcome-area">
    <div class="welcome-slides owl-carousel">
        <!-- Single Welcome Slide -->
        @foreach ( $galleries as $gallery)
        <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('/asset/gallery/'.$gallery->picture) }});"data-img-url="{{ asset('/asset/gallery/'.$gallery->picture) }}">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInLeft" data-delay="200ms">Hotel &amp; Resort</h6>
                                <h2 data-animation="fadeInLeft" data-delay="500ms">Welcome To Great Hotel</h2>
                                <a href="" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Single Welcome Slide -->
        @foreach ( $galleries as $gallery)
        <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('/asset/gallery/'.$gallery->picture) }});"data-img-url="{{ asset('/asset/gallery/'.$gallery->picture) }}">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInUp" data-delay="200ms">Hotel &amp; Resort</h6>
                                <h2 data-animation="fadeInUp" data-delay="500ms">Welcome To Great Hotel</h2>
                                <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInUp" data-delay="800ms">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Single Welcome Slide -->
        @foreach ( $galleries as $gallery)
        <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url({{ asset('/asset/gallery/'.$gallery->picture) }});"data-img-url="{{ asset('/asset/gallery/'.$gallery->picture) }}">                                <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInDown" data-delay="200ms">Hotel &amp; Resort</h6>
                                <h2 data-animation="fadeInDown" data-delay="500ms">Welcome To Great Hotels</h2>
                                <a href="/add-reservation" class="btn roberto-btn btn-2" data-animation="fadeInDown" data-delay="800ms">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Welcome Area End -->

<!-- About Us Area Start -->
<section class="roberto-about-area">
    <div class="container mt-100">
        <div class="row align-items-center">
            @foreach ($settings as $setting )
            <div class="col-12 col-lg-12">
                <!-- Section Heading -->
                <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                    <center><h6>About Us</h6></center>
                    <center><h2>Welcome to {{ $setting->name }}</center>
                </div>
                <div class="about-us-content mb-100">
                <center><h5 class="wow fadeInUp" data-wow-delay="300ms">{{ $setting->about }}</h5></center>
                    <p class="wow fadeInUp" data-wow-delay="400ms">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About Us Area End -->

<!-- Service Area Start -->
<div class="roberto-service-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-content d-flex align-items-center justify-content-between">
                    <!-- Single Service Area -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Area End -->

<!-- Our Room Area Start -->
<section class="roberto-rooms-area">
    <div class="rooms-slides owl-carousel">
        <!-- Single Room Slide --><!-- Thumbnail -->@foreach ($rooms as $room )
        <div class="single-room-slide d-flex align-items-center">
            <div class="room-thumbnail h-100 bg-img" style="background-image: url({{ asset('/asset/gallery/'.$room->gallery->picture) }});"></div>

            <!-- Content -->
            <div class="room-content">
                <h2 data-animation="fadeInUp" data-delay="100ms">{{ $room->type->name }}</h2>
                <h3 data-animation="fadeInUp" data-delay="300ms">{{ $room->price }}<span>/ Day</span></h3>
                <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms">
                    <li><span><i class="fa fa-check"></i> Capacity</span> <span>: {{ $room->person }} Person</span></li>
                    <li><span><i class="fa fa-check"></i> Bed</span> <span>: King Beds</span></li>
                    <li><span><i class="fa fa-check"></i> Services</span> <span>: Wifi, Television, Bathroom</span></li>
                </ul>
                <a href="/rooms" class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="700ms">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Our Room Area End -->

<!-- Testimonials Area Start -->
<section class="roberto-testimonials-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12 col-md-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    <center><h6>Testimonials</h6>
                    <h2>Our Guests Love Us</h2></center>
                </div>
                <!-- Testimonial Slide -->

                <div class="testimonial-slides owl-carousel mb-100">
                    @foreach ( $testimonis as $testimoni )
                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                        <center><h4>“{{ $testimoni->coment }}”</h4></center>
                        <div class="rating-title">
                            <div class="rating">

                            </div>
                            <center><h6>{{ $testimoni->user->name}}<span>- We Costumer</span></h6><center>
                        </div>
                    </div>
                    @endforeach<!-- Single Testimonial Slide -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Area End -->

<!-- Projects Area Start -->
<section class="roberto-project-area">
    <!-- Projects Slide -->
    <div class="projects-slides owl-carousel">
        @foreach ($fhotels as $fhotel )
        <!-- Single Project Slide -->
        <div class="single-project-slide active bg-img" style="background-image: url({{ asset('/asset/fhotel/'.$fhotel->picture) }});">
            <!-- Project Text -->
            <div class="project-content">
                <div class="text">
                    <h6>Facility</h6>
                    <h5>{{ $fhotel->name }}</h5>
                </div>
            </div>
            <!-- Hover Effects -->
            <div class="hover-effects">
                <div class="text">
                    <h6>Facility</h6>
                    <h5>{{ $fhotel->name }}</h5>
                    <p>{{ $fhotel->description }}</p>
                </div>
                <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        @endforeach
    </div>
</section>
<!-- Projects Area End -->

<!-- Blog Area Start -->
<section class="roberto-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>
<!-- Blog Area End -->
@endsection
