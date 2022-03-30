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
        <form method="post" action="/store-setting">
            @csrf
            @method('POST')
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Hotel Name</label>
                <input type="text" class="form-control" placeholder="Hotel Name" name="name">
              </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Address" name="addres">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>About</label>
                    <textarea class="form-control textarea" placeholder="About" name="about"></textarea>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" placeholder="Phone" name="phone">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" class="form-control" placeholder="Instagram" name="instagram">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div>
                </div>
            </div>
          <div class="row">
            <div class="update ml-3">
              <button type="submit" class="btn btn-primary btn-round">Create<i class="ml-2 fas fa-check "></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
