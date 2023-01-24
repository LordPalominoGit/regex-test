<?php

namespace App\Http\Controllers;

use App\Models\Pictures;
use App\Models\Images;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pictures = Images::all();
        return Inertia::render(
            'Pictures/Index',
            [
                'pictures' => $pictures
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function show(Pictures $pictures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function edit(Pictures $pictures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pictures $pictures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pictures $pictures)
    {
        //
    }
}
