@extends('layouts.frontend.app')

@section('content')

<div class="breadcrumb-area contact-breadcrumb bg-img bg-overlay jarallax" style="background-image: url({{ asset('frontend/assets/img/bg-img/18.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content text-center mt-100">
                    <h2 class="page-title">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/frontends">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Google Maps & Contact Info Area Start -->
<section class="google-maps-contact-info">
    <div class="container-fluid">
        <div class="google-maps-contact-content">
            @foreach ($settings as $setting )
            <div class="row">                    
                <!-- Single Contact Info -->
                <div class="col-6 col-lg-4">
                    <div class="single-contact-info">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Phone</h4>
                        <p>{{ $setting->phone }}</p>
                    </div>
                </div>
                <!-- Single Contact Info -->
                <div class="col-6 col-lg-4">
                    <div class="single-contact-info">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <p>{{ $setting->addres }}</p>
                    </div>
                </div>
                <!-- Single Contact Info -->
                <div class="col-6 col-lg-4">
                    <div class="single-contact-info">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <p>{{ $setting->email }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Google Maps -->
            <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.519139775628!2d107.58628461420089!3d-6.947922019947884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9e96f537ead%3A0xa4551b3521087fa9!2sHotel%20Hebat%20Bandung!5e0!3m2!1sid!2sid!4v1649313597316!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
    </div>
</section>

<section class="roberto-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>

@endsection