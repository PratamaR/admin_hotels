@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                <div class="d-flex ml-3">
                    <a href="/add-froome" class="btn btn-primary">Add New</a>
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
                      <th scope="col"> Name Facility </th>
                      <th scope="col"> Description </th>
                      <th scope="col"> Action </th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $froomes as $froome)
                      @php $i++ @endphp
                      <tr>
                          <td>{{ $i }}</td>
                          <td> {{ $froome->name }} </td>
                          <td> {{ $froome->description }} </td>
                          <td>
                          <form method="post" action="{{ route('froome-destroy', $froome->id) }}">
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('froome-edit', $froome->id) }}"><i class="fas fa-pen"></i></button></a>
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
            { width: 200, targets: 1 },
            { width: 100, targets: 3 }
        ],
    } );
} );
</script>
@endsection
