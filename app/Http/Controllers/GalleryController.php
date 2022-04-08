<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Type;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'List Gallery',
            'route' => route('gallery-create'),
            'galleries' => Gallery::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin.post.gallery_post.index', $data);
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
            'types' => Type::all(),
        ];
        return view('admin.post.gallery_post.create', $data);
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
            'title' => 'required',
            'id_type' => 'required',
            'description' => 'required',
            'status' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $picture = $request->file('picture');
        $name = uniqid().'.'.$picture->getClientOriginalExtension();
        $picture->move('asset/gallery/', $name);
        $validate['picture'] = $name;
        Gallery::create($validate);
        return redirect(route('gallery-list'))->with('message', 'Gallery Successfully Added');
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
            'types' => Type::all(),
            'route' => route('gallery-update', $id),
            'gallery' => Gallery::where('id', $id)->first(),
        ];
        return view('admin.post.gallery_post.edit', $data);
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
        $gallery = Gallery::find($id);
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            if (file_exists(public_path('asset/gallery/'.$gallery->picture))) {
                unlink(public_path('asset/gallery/'.$gallery->picture));
            }
            $name = time().'.'.$picture->getClientOriginalExtension();
            $picture->move('asset/gallery/', $name);
            $gallery->picture = $name;
        }
        $gallery->title = $request->title;
        $gallery->id_type = $request->id_type;
        $gallery->description = $request->description;
        $gallery->status = $request->status;
        $picture = $request->file('picture');
        $name = uniqid().'.'.$picture->getClientOriginalExtension();
        $gallery->update();
        return redirect(route('gallery-list'))->with('message', 'Gallery Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Gallery::where('id', $id);
        $destroy->delete();

        return redirect(route('gallery-list'))->with('message', 'Gallery Successfully Delete');
    }

    public function GalleryStatus($id)
    {
        $gallery = Gallery::find($id);
        $gallery->status = $gallery->status == "0" ? "1" : $gallery->status = "0";
        $gallery->save();
        return redirect(route('gallery-list'))->withSuccess('Status Successfully Update');
    }
}
