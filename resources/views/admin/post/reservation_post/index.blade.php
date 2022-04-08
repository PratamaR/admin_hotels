@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                @if (auth()->user()->role=='user')
                <div class="d-flex ml-3">
                    <a href="{{ $route }}" class="btn btn-primary">Add New</a>
                </div>
                @endif
                @if (auth()->user()->role=='admin')
                <div class="d-flex ml-3">
                    <a href="/report-pdf" class="btn btn-primary">Print All</a>
            </div>
                 @endif
                 @if (auth()->user()->role=='receptionist')
                 <div class="d-flex ml-3">
                    <a href="/report-pdf" class="btn btn-primary">Print All</a>
            </div>
            @endif
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
                    <th scope="col"> User </th>
                    <th scope="col"> Room Type </th>
                    <th scope="col"> ID Room </th>
                    <th scope="col"> Date Order </th>
                    <th scope="col"> Date Check In </th>
                    <th scope="col"> Date Check Out </th>
                    <th scope="col"> Guest</th>
                    <th scope="col"> Guest Name</th>
                    <th scope="col"> No KTP</th>
                    <th scope="col"> Status</th>
                    @if (auth()->user()->role=='user')
                    <th scope="col"> Action</th>
                    @endif
                    @if (auth()->user()->role=='receptionist')
                    <th scope="col"> Action</th>
                    @endif
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $reservations as $reservation)
                      @php $i++ @endphp
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $reservation->user->name}}</td>
                        <td>{{ $reservation->type->name }}</td>
                        <td>{{ $reservation->id_room }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->created_at)->format('l, d M Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->date_checkin)->format('l, d M Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->date_checkout)->format('l, d M Y')}}</td>
                        <td>{{ $reservation->guest }}</td>
                        <td>{{ $reservation->guest_name }}</td>
                        <td>{{ $reservation->no_ktp }}</td>
                        <td><a href="{{ route('reservation-status', ['id' => $reservation->id]) }}">{!! $reservation->status_text !!}</td>
                            @if (auth()->user()->role=='user')
                            <td>
                            @endif
                            @if (auth()->user()->role=='receptionist')
                            <td>
                            @endif
                          <form method="post" action="{{ route('reservation-destroy', $reservation->id) }}">
                            @if (auth()->user()->role=='user')
                            <a button type="button" class="btn btn-primary btn-circle" href="/report-pdf"><i class="fas fa-print"></i></button></a>
                            @endif
                            @if (auth()->user()->role=='receptionist')
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('reservation-edit', $reservation->id) }}"><i class="fas fa-pen"></i></button></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                      @endif
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
            { width: 200, targets: 10 }
        ],
    } );
} );
</script>
@endsection
