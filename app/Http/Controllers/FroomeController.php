<?php

namespace App\Http\Controllers;

use App\Models\Froome;
use Illuminate\Http\Request;

class FroomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'=>'List Facility',
            'froomes'=>Froome::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.post.froomes-post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'=>'Create List'
        ];
        return view('admin.post.froomes-post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $froome = new Froome();
        $froome->name = $request->name;
        $froome->description = $request->description;
        $froome->save();

        return redirect(route('froome-list'));
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
            'route' => route('froome-update', $id),
            'froome' => Froome::where('id', $id)->first(),
        ];
        return view('admin.post.froomes-post.edit', $data);
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
        $froome = Froome::find($id);
        $froome->name = $request->name;
        $froome->description = $request->description;
        $froome->update();

        return redirect(route('froome-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Froome::where('id', $id);
        $destroy->delete();

        return redirect(route('froome-list'));
    }
}
