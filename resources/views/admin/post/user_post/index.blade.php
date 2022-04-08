@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                <div class="d-flex ml-3">
                    <a href="{{ $route }}" class="btn btn-primary">Add New</a>
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
                    <th scope="col"> Name </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> No KTP </th>
                    <th scope="col"> Phone </th>
                    <th scope="col"> Address </th>
                    <th scope="col"> Photo </th>
                    <th scope="col"> Role </th>
                    <th scope="col"> Action</th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $users as $user)
                      @php $i++ @endphp
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->ktp }}</td>
                        <td>{{ $user->telp }}</td>
                        <td>{{ $user->address }}</td>
                        <td><img src="{{ asset('/asset/user/'.$user->photo) }}" style="max-height: 150px" alt="" class="img-thumbnail"></td>
                        <td>{{ $user->role }}</td>
                        <td>
                          <form method="post" action="{{ route('user-destroy', $user->id) }}">
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('user-edit', $user->id) }}"><i class="fas fa-pen"></i></button></a>
                      @csrf
                      @method('DELETE')
                      <button user="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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
