<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'List Testimoni',
            'testimonis' => Testimoni::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin.post.testimoni-post.index', $data);
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
        ];
        return view('admin.post.testimoni-post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimoni = new Testimoni();
        $testimoni->title = $request->title;
        $testimoni->coment = $request->coment;
        $testimoni->save();

        return redirect(route('testimoni-list'));
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
            'method' =>'PUT',
            'route' => route('testimoni-update', $id),
            'testimoni' => Testimoni::where('id', $id)->first(),
        ];
        return view('admin.post.testimoni-post.edit', $data);
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
        $testimoni = Testimoni::find($id);
        $testimoni->title = $request->title;
        $testimoni->coment = $request->coment;
        $testimoni->update();

        return redirect(route('testimoni-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Testimoni::where('id', $id);
        $destroy->delete();

        return redirect(route('testimoni-list'));
    }
}
