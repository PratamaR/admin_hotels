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
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Testimoni Title</label>
                <input type="text" class="form-control" placeholder="Testimoni Title" name="title" value="{{ $testimoni->title }}" required autocomplete>
              </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Coment</label>
                    <textarea class="form-control textarea" placeholder="Coment" name="coment" required autocomplete>{{ $testimoni->coment }}</textarea>
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


