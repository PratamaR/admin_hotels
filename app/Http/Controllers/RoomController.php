<?php

namespace App\Http\Controllers;

use App\Models\Froome;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'List Room',
            'route' => route('room-create'),
            'rooms' => Room::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin.post.room_post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create List',
            'froomes' => Froome::all(),
            'galleries' => Gallery::all(),
            'types' => Type::all(),
        ];
        return view('admin.post.room_post.create', $data);
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
            'no_room' => 'required',
            'id_froome' => 'required',
            'id_type' => 'required',
            'id_gallery' => 'required',
            'person' => 'required|numeric|min:1',
            'price' => 'required',
            'status' => 'required',
        ]);
        $room = new Room;
        $room->no_room = $request->no_room;
        $room->id_froome = $request->id_froome;
        $room->id_type = $request->id_type;
        $room->id_gallery = $request->id_gallery;
        $room->person = $request->person;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->save();

        return redirect(route('room-list'))->with('message', 'Room Successfully Added');
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
            'froomes' => Froome::all(),
            'types' => Type::all(),
            'galleries' => Gallery::all(),
            'route' => route('room-update', $id),
            'room' => Room::where('id', $id)->first(),
        ];

        return view('admin.post.room_post.edit', $data);
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
        $room = Room::find($id);
        $room->no_room = $request->no_room;
        $room->id_froome = $request->id_froome;
        $room->id_type = $request->id_type;
        $room->id_gallery = $request->id_gallery;
        $room->person = $request->person;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->update();

        return redirect(route('room-list'))->with('message', 'Room Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Room::where('id', $id);
        $destroy->delete();

        return redirect(route('room-list'))->with('message', 'Room Successfully Delete');
    }

    public function RoomStatus($id)
    {
        $room = Room::find($id);
        $room->status = $room->status == "0" ? "1" : $room->status = "0";
        $room->save();
        return redirect(route('room-list'))->withSuccess('Status Successfully Update');
    }

}
