@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                <div class="d-flex ml-3">
                    <a href="/add-room" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="col-12">
                @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
              <table class="table_id" id="table_id">
                  <thead class="text-black">
                    <th scope="col">No</th>
                    <th scope="col"> No Room </th>
                    <th scope="col"> Facility </th>
                    <th scope="col"> Room Type </th>
                    <th scope="col"> Title Gallery</th>
                    <th scope="col"> Person </th>
                    <th scope="col"> Price(IDR) </th>
                    <th scope="col"> Status </th>
                    <th scope="col"> Action</th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $rooms as $room)
                      @php $i++ @endphp
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $room->no_room }}</td>
                        <td>{{ $room->froome->name }}</td>
                        <td>{{ $room->type->name }}</td>
                        <td>{{ $room->gallery->title }}</td>
                        <td>{{ $room->person }}</td>
                        <td>{{ $room->price }}</td>
                        <td><a href="{{ route('room-status', ['id' => $room->id]) }}">{!! $room->status_text !!}</td>
                          <td>
                          <form method="post" action="{{ route('room-destroy', $room->id) }}">
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('room-edit', $room->id) }}"><i class="fas fa-pen"></i></button></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                  </form>
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
         </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    });
</script>

<script>
    $(document).ready(function() {
    $('#table_id').DataTable({
        columnDefs: [
            { width: 300, targets: 2 },
            { width: 200, targets: 3 },
            { width: 100, targets: 8 }
        ],
    } );
} );
</script>
@endsection
