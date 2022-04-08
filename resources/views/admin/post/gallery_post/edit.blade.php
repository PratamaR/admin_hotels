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
        <form method="post" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title Name" name="title" value="{{ $gallery->title }}" required autocomplete>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Category Gallery</label>
                    <select id="category" class="form-control" name="id_type" value= "{{ $gallery->id_type }}" required autocomplete >
                    <option value="">Galerry</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('type', $post->id_type??'')==$type->id?'selected':'' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
               </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control textarea" placeholder=" Facility Description" name="description" required autocomplete>{{ $gallery->description }}</textarea>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Input Picture File</label>
                <input class="form-control" type="file" name="picture" value="{{ $gallery->picture }}" required autocomplete>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" value="{{ $gallery->status }}" required autocomplete>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
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


