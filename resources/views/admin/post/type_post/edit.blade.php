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
                <label>Type Name</label>
                <input type="text" class="form-control" placeholder="Type Name" name="name" value="{{ $type->name }}" required autocomplete>
              </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control textarea" placeholder="Description" name="description" required autocomplete>{{ $type->description }}"</textarea>
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
