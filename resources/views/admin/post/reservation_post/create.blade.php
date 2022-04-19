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
        <form method="post" action="/store-reservation">
            @csrf
            @method('POST')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <select type="text" class="form-control" placeholder="User Name" name="id_user" hidden>
                            @foreach ( $users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                </div>
        </div>

        <div class="form-group">
            <label>Rooms Type</label>
                <select id="type" class="form-control" name="id_type"  required autocomplete autofocus>
                <option value="">Type</option>
                @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
            </select>
        </div>
        {{-- @if (auth()->user()->role=='admin') --}}
        <div class="form-group">
            <label>No Room</label>
                <select id="room" class="form-control" name="id_room"  required autocomplete>
                <option value="">Rooms</option>

            </select>
        </div>
        {{-- @endif --}}
            <div class="form-group">
              <label>Date Check In</label>
              <input type="date" class="form-control" placeholder="Date Checkin" name="date_checkin" required autocomplete>
            </div>
            <div class="form-group">
              <label>Date Check Out</label>
              <input type="date" class="form-control" placeholder="Date Checkout" name="date_checkout" required autocomplete>
            </div>
            <div class="form-group">
              <label>Guest</label>
              <input type="number" class="form-control" placeholder="Guest" name="guest" required autocomplete>
            </div>
            <div class="form-group">
              <label>Guest Name</label>
              <input type="text" class="form-control" placeholder="Guest Name" name="guest_name" required autocomplete>
            </div>
            <div class="form-group">
              <label>No KTP</label>
              <input type="number" class="form-control" placeholder="No KTP" name="no_ktp" required autocomplete>
            </div>
          <div class="form-group">
                <select class="form-control" name="status"  required autocomplete hidden>
                    <option value="0">Pending</option>
                    <option value="1">Checkin</option>
                    <option value="2">Pending</option>
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
        $(function(){
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
          $('#type').on('change', function(){
            let id_type = $('#type').val();

            $.ajax({
              type : 'POST',
              url  : "{{ route('getroom') }}",
              data : {id_type:id_type},
              cache : false,
              success:function(msg){
                $('#room').html(msg);
              },
              error:function(data){
                console.log('error:',data)
              },
            });
          });
        });
    });
</script>


    @endsection


