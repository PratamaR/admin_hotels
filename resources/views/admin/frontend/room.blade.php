@extends('layouts.frontend.app')

@section('content')

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{ asset('frontend/assets/img/bg-img/16.jpg') }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h2 class="page-title">Our Room</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Room</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="roberto-rooms-area section-padding-100-0">
    <div class="container">
            <div class="col-12 col-lg-12    ">
                <!-- Single Room Area -->
                @foreach ($rooms as $room)
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail" >
                        <img src="{{ asset('/asset/gallery/'.$room->gallery->picture) }}" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content col-md-8">
                        <h2>{{ $room->type->name }}</h2>
                        <h4>{{ $room->price }} <span>/ Day</span></h4>
                        <div class="room-feature">
                            <h6>Status <span>{{ $room->status }}</span></h6>
                            <h6>Capacity: <span>{{ $room->person }} person</span></h6>
                            <h6>Facility <span>{{ $room->froome->description }}</span></h6>
                        </div>
                        <a href="/add-reservation" class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="700ms">Book Now</a>
                    </div>
                </div>
                @endforeach
            </div>        
        </div>
    </div>
@endsection