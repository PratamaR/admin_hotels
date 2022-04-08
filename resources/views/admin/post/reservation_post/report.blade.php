 <div class="row">
    <div class="col-lg-12">
    <div class="card mb-12 py-3 border-bottom-primary">
                <div class="row ml-4">
                <strong><h4 class="card-title">Reservation</h4></strong>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table border="1" width="100%">
                  <thead class="text-black">
                    <th scope="col">No</th>
                    <th scope="col"> User </th>
                    <th scope="col"> ID Room </th>
                    <th scope="col"> No Room </th>
                    <th scope="col"> Date Order </th>
                    <th scope="col"> Date Check In </th>
                    <th scope="col"> Date Check Out </th>
                    <th scope="col"> Guest</th>
                    <th scope="col"> Guest Name</th>
                    <th scope="col"> No KTP</th>
                  </thead>
                  <tbody>
                      @php $i=0 @endphp
                      @foreach ( $reservations as $reservation)
                      @php $i++ @endphp
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $reservation->id_user}}</td>
                        <td>{{ $reservation->type->name }}</td>
                        <td>{{ $reservation->id_room}}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->created_at)->format('l, d M Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->date_checkin)->format('l, d M Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->date_checkout)->format('l, d M Y')}}</td>
                        <td>{{ $reservation->guest }}</td>
                        <td>{{ $reservation->guest_name }}</td>
                        <td>{{ $reservation->no_ktp }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
         </div>
    </div>
</div>


