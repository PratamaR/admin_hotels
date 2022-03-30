<?php

namespace App\Http\Controllers;

use App\Models\Fhotel;
use Illuminate\Http\Request;

class FhotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'List Hotel Facility',
            'fhotels' => Fhotel::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin.post.fhotel-post.index', $data);
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
        return view('admin.post.fhotel-post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $picture = $request->file('picture');
        $name = uniqid().'.'.$picture->getClientOriginalExtension();
        $picture->move('asset/fhotel/', $name);
        $validate['picture'] = $name;
        Fhotel::create($validate);
        return redirect(route('fhotel-list'));
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
            'route' => route('fhotel-update', $id),
            'fhotel' => Fhotel::where('id', $id)->first()
        ];
        return view('admin.post.fhotel-post.edit', $data);
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
        $fhotel = Fhotel::find($id);
        $fhotel->name = $request->name;
        $fhotel->description = $request->description;
        $picture = $request->file('picture');
        $name = uniqid().'.'.$picture->getClientOriginalExtension();
        $picture->move('asset/fhotel/', $name);
        $validate['picture'] = $name;
        $fhotel->update($validate);
        return redirect(route('fhotel-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Fhotel::where('id', $id);
        $destroy->delete();

        return redirect(route('fhotel-list'));
    }
}
