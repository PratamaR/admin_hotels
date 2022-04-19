<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role=='admin') {
            $data =[
                'title' => 'List Reservation',
                'route' => route('reservation-create'),
                'rooms' => Room::all(),
                'types' => Type::all(),
                'users' => User::all(),
                'reservations' => Reservation::orderBy('created_at', 'desc')->get(),
            ];
        }elseif (auth()->user()->role=='receptionist') {
            $data =[
                'title' => 'List Reservation',
                'route' => route('reservation-create'),
                'rooms' => Room::all(),
                'types' => Type::all(),
                'users' => User::all(),
                'reservations' => Reservation::orderBy('created_at', 'desc')->get(),
            ];
        } else {
            $data = [
                'title' => 'List Reservation',
                'route' => route('reservation-create'),
                'rooms' => Room::all(),
                'reservations' => Reservation::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
              ];
            }

        return view('admin.post.reservation_post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role=='admin') {

        $data = [
            'title' => 'Create List',
            'types' => Type::all(),
            'rooms' => Room::all(),
            'users' => User::all()
        ];

     } else {
            $data = [
                'title' => 'Create List',
                'types' => Type::all(),
                'rooms' => Room::all(),
                // FROM rooms
                // WHERE NOT EXISTS
                // (SELECT * FROM  reservations
                //    WHERE rooms.id = reservations.id_room),
                'users' => User::where('id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
            ];
        }
        return view('admin.post.reservation_post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_type' => 'required',
            'date_checkin' => 'required',
            'date_checkout' => 'required',
            'guest' => 'required',
            'guest_name' => 'required',
            'no_ktp' => 'required|numeric|min:15|',
            'status' => 'required',
        ]);
        $reservation = new Reservation();
        $reservation->id_user = $request->id_user;
        $reservation->id_type = $request->id_type;
        $reservation->id_room = $request->id_room;
        $reservation->date_checkin = $request->date_checkin;
        $reservation->date_checkout = $request->date_checkout;
        $reservation->guest = $request->guest;
        $reservation->guest_name = $request->guest_name;
        $reservation->no_ktp = $request->no_ktp;
        $reservation->status = $request->status;
        $reservation->save();

        return redirect(route('reservation-list'))->with('message', 'Reservation Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit List',
            'method' => 'PUT',
            'route' => route('reservation-update', $id),
            'reservation' => Reservation::where('id', $id)->first(),
            'types' => Type::all(),
            'rooms' => Room::all()
        ];
        return view('admin.post.reservation_post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->id_type = $request->id_type;
        $reservation->id_room = $request->id_room;
        $reservation->date_checkin = $request->date_checkin;
        $reservation->date_checkout = $request->date_checkout;
        $reservation->guest = $request->guest;
        $reservation->guest_name = $request->guest_name;
        $reservation->no_ktp = $request->no_ktp;
        $reservation->status = $request->status;
        $reservation->update();

        return redirect(route('reservation-list'))->with('message', 'Reservation Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Reservation::where('id', $id);
        $destroy->delete();

        return redirect(route('reservation-list'))->with('message', 'Reservation Successfully Delete');

    }

    public function ReservationStatus($id)
    {
        if (auth()->user()->role=='receptionist'){
            $reservation = Reservation::find($id);
            $reservation->status = $reservation->status == 0 ? 1 : 2 ;
            $reservation->save();
        }
        return redirect(route('reservation-list'))->withSuccess('Status Successfully Update');
    }

    public function print_pdf()
    {
        if (auth()->user()->role=='admin') {
    	$reservation =  Reservation::orderBy('created_at', 'desc')->get();
        }elseif (auth()->user()->role=='receptionist') {
        $reservation =  Reservation::orderBy('created_at', 'desc')->get();
        }else{
        $reservation =  Reservation::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
    	$pdf = PDF::loadview('admin.post.reservation_post.report',['reservations'=>$reservation])->setPaper('a4', 'landscape');
    	return $pdf->download('report-reservation.pdf');
    }

    public function getRoom(Request $request)
    {
        $id_type = $request->id_type;

        $rooms = Room::where('id_type', $id_type)->get();
        foreach($rooms as $room){
            echo "<option value='$room->id'>$room->no_room</option>";
        }
    }
}
