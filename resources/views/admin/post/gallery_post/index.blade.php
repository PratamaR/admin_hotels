@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                <div class="d-flex ml-3">
                    <a href="/add-gallery" class="btn btn-primary">Add New</a>
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
                      <th scope="col">Gallery Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Description</th>
                      <th scope="col">Picture</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $galleries as $gallery)
                      @php $i++ @endphp
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->type->name}}</td>
                        <td>{{ $gallery->description }}</td>
                        <td><img src="{{ asset('/asset/gallery/'.$gallery->picture) }}" style="max-height: 150px" alt="" class="img-thumbnail"></td>
                        <td><a href="{{ route('gallery-status', ['id' => $gallery->id]) }}">{!! $gallery->status_text !!}</td>
                          <td>
                          <form method="post" action="{{ route('gallery-destroy', $gallery->id) }}">
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('gallery-edit', $gallery->id) }}"><i class="fas fa-pen"></i></button></a>
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
            { width: 100, targets: 2 },
            { width: 100, targets: 6 }
        ],
    } );
} );
</script>
@endsection
