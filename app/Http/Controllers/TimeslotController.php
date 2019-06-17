<?php

namespace App\Http\Controllers;

use App\DefaultTimeslot;
use App\Timeslot;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = Timeslot::orderBy('id', 'desc')->paginate(130);
        return view('timeslot.index', compact('timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defaultTimeslots = DefaultTimeslot::all();
        return view('timeslot.create', compact('defaultTimeslots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $startDate = new Carbon($request->input('start_date'));
        $endDate = new Carbon($request->input('end_date'));
        $default_timeslot_ids = $request->input('default_timeslot_id');

        $count = 0;
        while ($startDate->lessThanOrEqualTo($endDate)) {
            foreach ($default_timeslot_ids as $default_timeslot_id) {
                $timeslot = Timeslot::create(['date' => $startDate->toDateString(), 'default_timeslot_id' => $default_timeslot_id]);
                ++$count;
	    }
            $startDate->addDay();
        }
        //return compact('startDate', 'endDate', 'default_timeslot_id');
        return redirect()->route('timeslot.index')->with('status', 'Created ' . $count . ' timeslots');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function show(Timeslot $timeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeslot $timeslot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timeslot $timeslot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeslot $timeslot)
    {
        //
    }
}
