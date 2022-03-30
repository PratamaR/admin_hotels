<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'List Setting',
            'settings' => Setting::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin.post.setting-post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            'title' => 'Create List',
        ];
        return view('admin.post.setting-post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting();
        $setting->name = $request->name;
        $setting->addres = $request->addres;
        $setting->about = $request->about;
        $setting->phone = $request->phone;
        $setting->instagram = $request->instagram;
        $setting->email = $request->email;
        $setting->save();

        return redirect(route('setting-list'));
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
            'route' => route('setting-update', $id),
            'setting' => Setting::where('id', $id)->first(),
        ];
        return view('admin.post.setting-post.edit', $data);
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
        $setting = Setting::find($id);
        $setting->name = $request->name;
        $setting->addres = $request->addres;
        $setting->about = $request->about;
        $setting->phone = $request->phone;
        $setting->instagram = $request->instagram;
        $setting->email = $request->email;
        $setting->update();

        return redirect(route('setting-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Setting::where('id', $id);
        $destroy->delete();

        return redirect(route('setting-list'));
    }
}
