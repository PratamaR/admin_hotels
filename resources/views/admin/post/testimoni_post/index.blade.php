@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                <div class="d-flex ml-3">
                    @if (Auth::user()->role=="user")
                    <a href="{{ $route }}" class="btn btn-primary">Add New</a>
                    @endif
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
                      <th scope="col">Name </th>
                      <th scope="col">Title </th>
                      <th scope="col">Coment </th>
                      <th scope="col">Action </th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $testimonis as $testimoni)
                      @php $i++ @endphp
                      <tr>
                          <td>{{ $i }}</td>
                          <td> {{ $testimoni->user->name }} </td>
                          <td> {{ $testimoni->title }} </td>
                          <td> {{ $testimoni->coment }} </td>
                          <td>
                          <form method="post" action="{{ route('testimoni-destroy', $testimoni->id) }}">
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('testimoni-edit', $testimoni->id) }}"><i class="fas fa-pen"></i></button></a>
                      @csrf
                      @method('DELETE')
                      @if (auth()->user()->role=='admin')
                      <button type="submit" class="btn btn-danger btn-circle" href="{{ route('testimoni-destroy',$testimoni->id) }}"><i class="fas fa-trash"></i></button>
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
    $('#table_id').DataTable();
} );
</script>
@endsection
