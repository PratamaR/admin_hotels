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
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="name" value="{{ $user->name }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email"  @error('email') is-invalid @enderror name="email" value="{{ $user->email }}" required autocomplete="email" readonly/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                            <label>No KTP</label>
                            <input type="number" class="form-control" placeholder="KTP" @error('ktp') is-invalid @enderror name="ktp" value="{{ $user->ktp  }}" required autocomplete="ktp"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" placeholder="Number Phone" @error('telp') is-invalid @enderror name="telp" value="{{ $user->telp  }}" required autocomplete="telp"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control textarea" placeholder="Address" name="address" >{{ $user->address }}</textarea>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="formFileMultiple" class="form-label">Input Photo File</label>
                    <input class="form-control" type="file" @error('photo') is-invalid @enderror name="photo" value="{{ $user->photo }}" required autocomplete="photo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" @error('role') is-invalid @enderror name="role" value="{{ $user->role }}" required autocomplete="role">
                      <option value="admin">Admin</option>
                      <option value="member">Member</option>
                      <option value="receptionist">Receptionist</option>
                    </select>
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
