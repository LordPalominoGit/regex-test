<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$images = Images::all();
        return Inertia::render(
            'Images/UploadImage',
            [
                //'images' => $books
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Images $image)
    {
        $userId = Auth::id();
        $path=null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }

        $image->title       = $request->title;
        $image->description = $request->description;
        $image->userId      = $userId;
        $image->filePath    = 'storage/'.$path;
        $image->save();
        sleep(1);
        dd('OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}
