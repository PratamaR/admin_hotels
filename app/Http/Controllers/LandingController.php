<?php

namespace App\Http\Controllers;

use App\Models\Fhotel;
use App\Models\Froome;
use App\Models\Gallery;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Testimoni;
use App\Models\Type;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'types' =>Type::all(),
            'settings' => Setting::all(),
            'galleries' => Gallery::all(),
            'froomes' => Froome::all(),
            'fhotels' => Fhotel::all(),
            'testimonis' => Testimoni::all(),
            'rooms' => Room::all(),
            'reservations' => Reservation::all()
        ];
        return view('admin.frontend.home', $data);

    }

    public function kamar()
    {
        $data = [
            'types' =>Type::all(),
            'settings' => Setting::all(),
            'galleries' => Gallery::all(),
            'froomes' => Froome::all(),
            'fhotels' => Fhotel::all(),
            'testimonis' => Testimoni::all(),
            'rooms' => Room::all(),
            'reservations' => Reservation::all()
        ];
        return view('admin.frontend.room', $data);

    }

    public function detail()
    {
        $data = [
            'types' =>Type::all(),
            'settings' => Setting::all(),
            'galleries' => Gallery::all(),
            'froomes' => Froome::all(),
            'fhotels' => Fhotel::all(),
            'testimonis' => Testimoni::all(),
            'rooms' => Room::all(),
            'reservations' => Reservation::all()
        ];
        return view('admin.frontend.room_detail', $data);

    }

    public function contact()
    {
        $data = [
            'types' =>Type::all(),
            'settings' => Setting::all(),
            'galleries' => Gallery::all(),
            'froomes' => Froome::all(),
            'fhotels' => Fhotel::all(),
            'testimonis' => Testimoni::all(),
            'rooms' => Room::all(),
            'reservations' => Reservation::all()
        ];
        return view('admin.frontend.contact', $data);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
