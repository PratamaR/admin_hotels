@extends('layouts.admin.app')
@section('title','Catatan Perjalanan')
@section ('content')
@php
$url = Route::current()->getName();
@endphp
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-button">
            @if (Auth::user()->role=="User")
            <a href="{{ $route }}" class="btn btn-primary">Tambah Baru</a>
            @endif
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route("home") }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route("trip.index") }}">Perjalanan</a></div>
              <div class="breadcrumb-item">Semua</div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card mb-0">
                <div class="card-body">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link {{ str_contains($url, 'index') ? 'active' : '' }}" href="{{ route("trip.index") }}">Total Perjalanan <span class= "{{ str_contains($url, 'index') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $sumtrip }}</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ str_contains($url, 'today') ? 'active' : '' }}" href="{{ route("trip.today") }}">Perjalanan hari ini <span class="{{ str_contains($url, 'today') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $todaytrip }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains($url, 'trash') ? 'active' : '' }}" href="{{ route("trip.trash") }}">Perjalanan di hapus <span class="{{ str_contains($url, 'trash') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $terhapus }}</span></a>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
            <div class id="row">
                <div class="section-header-breadcrumb">
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
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  {{-- <div class="card-header">
                    <h4>All Posts</h4>
                  </div> --}}

                  <div class="card-body">
                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Suhu Tubuh</th>
                                <th>Moda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($trips as $trip)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $trip->user->nik }}</td>
                                <td>{{ \Carbon\Carbon::parse($trip->tanggal)->format('d M Y')}}</td>
                                <td>{{ $trip->waktu }}</td>
                                <td>{{ $trip->nama_lokasi }}</td>
                                <td>{{ $trip->suhu }} &#8451;</td>
                                <td>{{ $trip->moda }}</td>
                                <td>
                                    <a class="btn btn btn-warning btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('trip.edit',$trip->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    @if (auth()->user()->role=='Admin')
                                    <a class="btn btn btn-danger btn-flat" data-toggle="tooltip" title='Delete'  href="{{ route('trip.destroy',['id' => $trip->id]) }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                    <a id= "set_dtl" class="btn btn btn-primary btn-flat"
                                    data-toggle="modal" data-target ="#modal-detail"
                                    data-nik="{{ $trip->user->nik }}"
                                    data-name="{{ $trip->user->name }}"
                                    data-tanggal="{{ \Carbon\Carbon::parse($trip->tanggal)->format('d M Y')}}"
                                    data-waktu="{{ $trip->waktu }}"
                                    data-lokasi="{{ $trip->nama_lokasi }}"
                                    data-alamat_lokasi="{{ $trip->alamat_lokasi }}"
                                    data-suhu="{{ $trip->suhu }}"
                                    data-moda = "{{ $trip->moda }}"
                                    title='Delete'  href=""><i class="fa fa-info"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



      </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
        $('#table_id').DataTable({
            "columnDefs": [
            {
                width: 200, targets: 4,
            }
            ],
            "className": 'dt-body-center',
        "fixedColumns": true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
        });
    } );
</script>

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
        $(document).on('click', '#set_dtl', function() {
            var nik = $(this).data('nik');
            var name = $(this).data('name');
            var tanggal = $(this).data('tanggal');
            var waktu = $(this).data('waktu');
            var nama_lokasi = $(this).data('lokasi');
            var alamat_lokasi = $(this).data('alamat_lokasi');
            var suhu = $(this).data('suhu');
            var moda = $(this).data('moda');
            $('#nik').text(nik);
            $('#name').text(name);
            $('#tanggal').text(tanggal);
            $('#waktu').text(waktu);
            $('#nama_lokasi').text(nama_lokasi);
            $('#alamat_lokasi').text(alamat_lokasi);
            $('#suhu').text(suhu);
            $('#moda').text(moda);
        })
    })
</script>

<div class="modal fade" role="dialog" id="modal-detail">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Perjalanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
            <table class="display">
                <tbody>
                    <tr>
                        <th style="width:45%">NIK</th>
                        <th style="width:5%">:</th>
                        <td><span id="nik"></span></td>
                    </tr>
                    <tr>
                        <th style="width:45%">Nama Pengguna</th>
                        <th style="width:5%">:</th>
                        <td><span id="name"></span></td>
                    </tr>
                    <tr>
                        <th style="width:45%">Tanggal</th>
                        <th style="width:5%">:</th>
                        <td><span id="tanggal"></span></td>
                    </tr>
                    <tr>
                        <th style="width:45%">Jam</th>
                        <th style="width:5%">:</th>
                        <td><span id="waktu"></span></td>
                    </tr>
                    <tr>
                        <th style="width:45%">Nama Lokasi</th>
                        <th style="width:5%">:</th>
                        <td><span id="nama_lokasi"></span></td>
                    </tr>
                    <tr>
                        <th style="width:45%">Alamat Lokasi</th>
                        <th style="width:5%">:</th>
                        <td><span id="alamat_lokasi"></span></td>
                    </tr>
                    <tr>
                        <th style="width:45%">Suhu Tubuh</th>
                        <th style="width:5%">:</th>
                        <td><span id="suhu"></span>&#8451;</td>
                    </tr>
                    <tr>
                        <th style="width:45%">Moda Transportasi</th>
                        <th style="width:5%">:</th>
                        <td><span id="moda"></span></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <hr><center>Jangan Lengah, jangan nyerah. Patuhi Protokol Kesehatan<center>
            </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

