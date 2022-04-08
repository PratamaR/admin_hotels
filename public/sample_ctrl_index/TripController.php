<?php
namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role=='Admin') {
            $data=[
                'title'=>'Data Perjalanan',
                'trips'=> Trip::orderBy('created_at', 'desc')->get(),
                'route' => route('trip.create'),
                'sumtrip' => Trip::all()->count(),
                'todaytrip' => Trip::where('tanggal', today())->count(),
                'terhapus' => Trip::onlyTrashed()->count(),
            ];
        } else {
            $data=[
                'title'=>'Data Perjalanan',
                'trips'=> Trip::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
                'route' => route('trip.create'),
                'sumtrip' => Trip::where('user_id', auth()->user()->id)->count(),
                'todaytrip' => Trip::where('user_id', auth()->user()->id)->where('tanggal', today())->count(),
                'terhapus' => Trip::onlyTrashed()->count(),
            ];
        }
        return view('admin.trip.index', $data);
    }

    public function today()
    {
        if (auth()->user()->role=='Admin') {
            $data=[
                'title'=>'Data Perjalanan',
                'trips'=> Trip::where('tanggal', today())->get(),
                'route' => route('trip.create'),
                'sumtrip' => Trip::all()->count(),
                'todaytrip' => Trip::where('tanggal', today())->count(),
                'terhapus' => Trip::onlyTrashed()->count(),
            ];
        } else {
            $data=[
                'title'=>'Data Perjalanan',
                'trips'=> Trip::where('user_id', auth()->user()->id)->where('tanggal', today())->get(),
                'route' => route('trip.create'),
                'sumtrip' => Trip::where('user_id', auth()->user()->id)->count(),
                'todaytrip' => Trip::where('user_id', auth()->user()->id)->where('tanggal', today())->count(),
                'terhapus' => Trip::onlyTrashed()->count(),
            ];
        }
        return view('admin.trip.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Catatan Perjalanan',
            'method' => 'POST',
            'route' => route('trip.store'),
        ];
        return view('admin.trip.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=> 'Isian tidak boleh kosong',
            'min'=> 'Suhu tubuh terlalu rendah'
        ];

        $request->validate([
            'waktu' => 'required',
            'suhu' => 'required|numeric|min:35',
            'moda'=>'required',
            'kesehatan'=>'required',
            'nama_lokasi'=>'required',
            'alamat_lokasi'=>'required',
            'tanggal'=>'required',
        ], $messages);

        $trip = new Trip;
        $user_id = auth()->user()->id;
        $trip->user_id = $user_id;
        $trip->moda = $request->moda;
        $trip->suhu = $request->suhu;
        $trip->kesehatan = $request->kesehatan;
        $trip->nama_lokasi = $request->nama_lokasi;
        $trip->alamat_lokasi = $request->alamat_lokasi;
        $trip->tanggal = $request->tanggal;
        $trip->waktu = $request->waktu;
        $trip->save();

        return redirect()->route('trip.index')->with('message', 'Perjalanan berhasil disimpan');
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
            'title' => 'Ubah Catatan Perjalanan',
            'method' => 'PUT',
            'route' => route('trip.update', $id),
            'trip' => Trip::where('id', $id)->first(),
        ];
        return view('admin.trip.editor', $data);
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
        $messages = [
            'required'=> 'Isian tidak boleh kosong',
            'min'=> 'Suhu tubuh terlalu rendah'
        ];

        $request->validate([
            'waktu' => 'required',
            'suhu' => 'required|numeric|min:35',
            'moda'=>'required',
            'kesehatan'=>'required',
            'nama_lokasi'=>'required',
            'alamat_lokasi'=>'required',
            'tanggal'=>'required',
        ], $messages);

        $trip = Trip::find($id);
        // $user_id = auth()->user()->id;
        // $trip->user_id = $user_id;
        $trip->moda = $request->moda;
        $trip->suhu = $request->suhu;
        $trip->kesehatan = $request->kesehatan;
        $trip->nama_lokasi = $request->nama_lokasi;
        $trip->alamat_lokasi = $request->alamat_lokasi;
        $trip->tanggal = $request->tanggal;
        $trip->waktu = $request->waktu;
        $trip->update();
        return redirect()->route('trip.index')->with('message', 'Catatan Perjalanan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::where('id', $id);
        $trip->delete();
        return back()->with('message', 'Caatatan Perjalanan berhasil dihapus');
    }

    public function trash()
    {
        $data=[
            'title'=>'Tong Sampah',
            'trips'=> Trip::onlyTrashed()->get(),
            'route' => route('trip.create'),
            'sumtrip' => Trip::where('user_id', auth()->user()->id)->count(),
            'todaytrip' => Trip::where('user_id', auth()->user()->id)->where('tanggal', today())->count(),
            'terhapus' => Trip::onlyTrashed()->count(),
        ];
        return view('admin.trip.trash', $data);
    }

    public function restore($id)
    {
        $post = Trip::onlyTrashed()->where('id', $id);
        $post->restore();
        return redirect()->route('trip.index')->with('message', 'Perjalanan terhapus berhasil dikembalikan');
    }

    public function restore_all()
    {
        $post = Trip::onlyTrashed();
        $post->restore();
        return redirect()->route('post.index')->with('message', 'Semua perjalanan terhapus berhasil dikembalikan');
    }

    public function force_del($id)
    {
        $post = Trip::onlyTrashed()->where('id', $id);
        $post->forceDelete();
        return redirect()->route('trip.index')->with('message', 'Perjalanan berhasil dihapus permanen');
    }

    public function destroy_all()
    {
        $post = Trip::onlyTrashed();
        $post->forceDelete();
        return redirect()->route('trip.index')->with('message', 'Semua perjalanan berhasil dihapus permanen');
    }
}
