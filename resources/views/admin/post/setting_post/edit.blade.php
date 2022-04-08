@extends('layouts.admin.app')

@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-11">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">{{ $title }}</h5>
              </div>
              <div class="card-body">
                <form method="post" action="{{ $route }}">
                    @csrf
                    @method($method)
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Hotel Name</label>
                            <input type="text" class="form-control" placeholder="Hotel Name" name="name" value="{{ $setting->name }}" required autocomplete>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="addres" value="{{ $setting->addres }}" required autocomplete>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control textarea" placeholder="About" name="about" required autocomplete>{{ $setting->about }}</textarea>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" placeholder="Phone" name="phone" value="{{ $setting->phone }}" required autocomplete>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="{{ $setting->instagram }}" required autocomplete>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $setting->email }}" required autocomplete>
                              </div>
                            </div>
                        </div>
                  <div class="row">
                    <div class="update ml-3">
                      <button type="submit" class="btn btn-primary btn-round">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
