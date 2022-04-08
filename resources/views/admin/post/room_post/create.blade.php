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
        <form method="post" action="/store-room">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No Room</label>
                    <input type="text" class="form-control" placeholder="No Room" name="no_room" required autocomplete>
                  </div>
                </div>
                </div>
                    <div class="form-group">
                        <label>Facility</label>
                <select id="category" class="form-control" name="id_froome" required autocomplete>
                    <option value="">Facility</option>
                    @foreach($froomes as $froome)
                    <option value="{{ $froome->id }}" {{ old('froome', $post->id_froome??'')==$froome->id?'selected':'' }}>{{ $froome->name }}</option>
                    @endforeach
                </select>
                    </div>
                    <div class="form-group">
                        <label>Room Type</label>
                <select id="category" class="form-control" name="id_type">
                    <option value="">Type</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('type', $post->id_type??'')==$type->id?'selected':'' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                    </div>
                    <div class="form-group">
                    <label>Type Gallery</label>
                <select id="category" class="form-control" name="id_gallery">
                    <option value="">Galerry</option>
                    @foreach($galleries as $gallery)
                    <option value="{{ $gallery->id }}" {{ old('gallery', $post->id_gallery??'')==$gallery->id?'selected':'' }}>{{ $gallery->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label> Person</label>
                <input type="number" class="form-control" placeholder="Person" name="person" required autocomplete>
              </div>
              <div class="form-group">
                <label> Price</label>
                <input type="text" class="form-control" placeholder="Price" name="price" id=dengan-rupiah required autocomplete>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required autocomplete>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                    
                  </select>
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


@section('script')
<script>
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection
