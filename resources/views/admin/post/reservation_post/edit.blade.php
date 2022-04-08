@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h3 class="card-title">{{ $title }}</h3></strong>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ $route }}">
            @csrf
            @method($method)
                <div class="col-md-12">
                    <div class="form-group">
                        {{-- <label>Name</label> --}}
                        <input type="text" class="form-control" placeholder="User Name" name="username" value=" {{ Auth::user()->name }}" hidden/>
                    </div>
                </div>
            <div class="col-md-12">
         <div class="form-group">
            <label>Room Type</label>
        <select id="category" class="form-control" name="id_type" value="{{ $reservation->id_type }}"  required autocomplete autofocus>
            <option value="">Room</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ old('type', $post->id_room??'')==$type->id?'selected':'' }}>{{ $type->name }}</option>
            @endforeach
        </select>
        </div>
            </div>
        <div class="col-md-12">
            <div class="form-group">
            <label>Room</label>
        <select id="category" class="form-control" name="id_room" required autofocus value="{{ $reservation->id_room }}"  required autocomplete>
            <option value="">No Room</option>
            @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ old('room', $post->id_room??'')==$room->id?'selected':'' }}>{{ $room->no_room }}</option>
            @endforeach
        </select>
        </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Date Check In</label>
              <input type="date" class="form-control" placeholder="Date Checkin" name="date_checkin" value="{{ $reservation->date_checkin }}"  required autocomplete>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Date Check Out</label>
              <input type="date" class="form-control" placeholder="Date Checkout" name="date_checkout" value="{{ $reservation->date_checkout }}"  required autocomplete>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Guest</label>
              <input type="number" class="form-control" name="guest" value="{{ $reservation->guest }}" required autocomplete>
              </select>
            </div>
            </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Guest Name</label>
              <input type="text" class="form-control" placeholder="Guest Name" name="guest_name" value="{{ $reservation->guest_name }}"required autocomplete >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>No KTP</label>
              <input type="number" class="form-control" placeholder="No KTP" name="no_ktp" value="{{ $reservation->no_ktp }}" required autocomplete>
            </div>
          </div>
          <div class="col-md-12">
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" value="{{ $reservation->status }}" required autocomplete>
                <option value="0">Pending</option>
                <option value="1">Checkin</option>
                <option value="2">Pending</option>
            </select>
          </div>
          </div>
        </div>
     </div>
          <div class="row">
            <div class="update ml-3">
              <button type="submit" class="btn btn-primary btn-round">Update<i class="ml-2 fas fa-check "></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


