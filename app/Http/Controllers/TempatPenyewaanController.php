<?php

namespace App\Http\Controllers;

use App\TempatPenyewaan;
use Illuminate\Http\Request;

class TempatPenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view("tempat-penyewaan.index");
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
     * @param  \App\TempatPenyewaan  $tempatPenyewaan
     * @return \Illuminate\Http\Response
     */
    public function show(TempatPenyewaan $tempatPenyewaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempatPenyewaan  $tempatPenyewaan
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatPenyewaan $tempatPenyewaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempatPenyewaan  $tempatPenyewaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatPenyewaan $tempatPenyewaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempatPenyewaan  $tempatPenyewaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatPenyewaan $tempatPenyewaan)
    {
        //
    }
}