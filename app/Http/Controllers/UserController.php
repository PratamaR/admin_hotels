<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'=> 'List User',
            'route' => route('user-create'),
            'users' => User::orderBy('created_at', 'desc' )->get(),
        ];
        return view('admin.post.user_post.index', $data);
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
        return view('admin.post.user_post.create', $data);
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
            'email' => 'required',
            'ktp' => 'required',
            'telp' => 'required',
            'address' => 'required',
            'role' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $photo = $request->file('photo');
        $name = uniqid().'.'.$photo->getClientOriginalExtension();
        $photo->move('asset/user/', $name);
        $validate['photo'] = $name;
        User::create($validate);
        return redirect('/list-user')->with('message', 'User Successfully Added');
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
            'route' => route('user-update', $id),
            'user' => User::where('id', $id)->first(),
        ];
        return view('admin.post.user_post.edit', $data);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->ktp = $request->ktp;
        $user->telp = $request->telp;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->role = $request->role;
        $photo = $request->file('photo');
        $name = uniqid().'.'.$photo->getClientOriginalExtension();
        $photo->move('asset/user/', $name);
        $validate['photo'] = $name;
        $user->update($validate);
        return redirect(route('user-list'))->with('message', 'User Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = User::where('id', $id);
        $destroy->delete();
        return redirect(route('user-list'))->with('message', 'User Successfully Delete');
    }
    // public function UserStatus($id)
    // {
    //     if (auth()->user()->role=='admin') {
    //     $user = User::find($id);
    //     $user->role = $user->role == 'user' ? 'receptionist' : 'admin' ;
    //     $user->save();
    //     }
    //     return redirect(route('user-list'))->withSuccess('Status Successfully Update');
    // }
}
