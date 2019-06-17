<?php

namespace App\Http\Controllers\Api;

use App\DefaultTimeslot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefaultTimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defaultTimeslots = DefaultTimeslot::all();
        return response($defaultTimeslots);
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
     * @param  \App\DefaultTimeslot  $defaultTimeslot
     * @return \Illuminate\Http\Response
     */
    public function show(DefaultTimeslot $defaultTimeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DefaultTimeslot  $defaultTimeslot
     * @return \Illuminate\Http\Response
     */
    public function edit(DefaultTimeslot $defaultTimeslot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DefaultTimeslot  $defaultTimeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefaultTimeslot $defaultTimeslot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DefaultTimeslot  $defaultTimeslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefaultTimeslot $defaultTimeslot)
    {
        //
    }
}
