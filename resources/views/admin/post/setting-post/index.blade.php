@extends('layouts.admin.app')

@section('content')

 <!-- Content Row -->
 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">{{ $title }}</h4></strong>
                <div class="d-flex ml-3">
                    <a href="/add-setting" class="btn btn-primary">Create Post</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
              <table class="table" id="table_id">
                  <thead class="text-black">
                      <th scope="col">No</th>
                      <th scope="col"> Hotel Name </th>
                      <th scope="col"> Address </th>
                      <th scope="col"> About </th>
                      <th scope="col"> Phone </th>
                      <th scope="col"> Instagram </th>
                      <th scope="col"> Email </th>
                      <th scope="col"> Action </th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $settings as $setting)
                      @php $i++ @endphp
                      <tr>
                          <td>{{ $i }}</td>
                          <td> {{ $setting->name }} </td>
                          <td> {{ $setting->addres }} </td>
                          <td> {{ $setting->about }} </td>
                          <td> {{ $setting->phone }} </td>
                          <td> {{ $setting->instagram }} </td>
                          <td> {{ $setting->email }} </td>
                          <td>
                          <form method="post" action="{{ route('setting-destroy', $setting->id) }}">
                      <a button type="button" class="btn btn-warning btn-circle" href="{{ route('setting-edit', $setting->id) }}"><i class="fas fa-pen"></i></button></a>
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


