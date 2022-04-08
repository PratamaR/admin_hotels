<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role=='admin') {
        $data = [
            'title' => 'Dashboard',
            'users'=> User::all()->count(),
            'reservations'=> Reservation::all()->count(),
            'rooms' => Room::all()->count(),
            'testimonis' => Testimoni::all()->count()
        ];
        }elseif (auth()->user()->role=='receptionist') {
            $data = [
                'title' => 'Dashboard',
                'users'=> User::all()->count(),
                'reservations'=> Reservation::all()->count(),
                'rooms' => Room::all()->count(),
                'testimonis' => Testimoni::all()->count()
            ];
        }else{
            $data = [
                'title' => 'Dashboard',
                'users'=> User::all()->count(),
                'reservations' =>  Reservation::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->count(),
                'rooms' => Room::all()->count(),
                'testimonis' => Testimoni::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->count(),
            ];
        }
        return view('admin.dashboard', $data);
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
