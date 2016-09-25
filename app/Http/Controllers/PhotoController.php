<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();

        return view('photos.index')->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'required|file|image',
            'body'  => 'required'
        ]);

        $photo = new Photo($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $photo->image = $imageName;
        }

        request()->user()->photos()->save($photo);

        return $this->redirectToPhoto($photo);
    }

    /**
     * Display the specified resource.
     *
     * @param  Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $this->authorize('edit', $photo);

        return view('photos.edit')->with('photo', $photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $this->validate($request, [
            'title' => 'required|max:255',
            'body'  => 'required'
        ]);

        $photo->update($request->all());

        return $this->redirectToPhoto($photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $this->authorize('destroy', $photo);

        File::delete(public_path("img/{$photo->image}"));

        $photo->delete();

        return redirect(route('photos.index'));
    }

    private function redirectToPhoto($photo)
    {
        return redirect(route('photos.show', $photo->id));
    }
}
