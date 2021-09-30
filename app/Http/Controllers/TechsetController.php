<?php

namespace App\Http\Controllers;

use App\Models\Techset;
use Illuminate\Http\Request;

class TechsetController extends Controller
{
    public function getTechSet() {

        $techsets = Techset::all();

        return response()->json(array('Techsets' => $techsets));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Models\Techset  $techset
     * @return \Illuminate\Http\Response
     */
    public function show(Techset $techset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Techset  $techset
     * @return \Illuminate\Http\Response
     */
    public function edit(Techset $techset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Techset  $techset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Techset $techset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Techset  $techset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Techset $techset)
    {
        //
    }
}
