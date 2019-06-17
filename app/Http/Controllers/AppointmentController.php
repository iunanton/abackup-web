<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    private $locale;

    public function __construct() {
        if (Route::current() != null) {
            $this->locale = Route::current()->parameter('locale');
            app()->setLocale($this->locale);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::withTrashed()->orderBy('created_at', 'desc')->paginate(20);
        return view('staff.appointment')->withAppointments($appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $endOfBooking = Carbon::createFromTime(15,00,00,'Asia/Hong_Kong');
        $allowTodayBooking = Carbon::now()->lessThan($endOfBooking);

        $timeslots = Timeslot::doesntHave('appointments')->with('defaultTimeslot')->where('date', '>=', Carbon::today())->get();

        $currentMonth = Carbon::now()->startOfMonth();
        $nextMonth = Carbon::now()->startOfMonth()->addMonth();

        $currentMonthGrid = $this->getGrid($currentMonth);
        $nextMonthGrid = $this->getGrid($nextMonth);

        return view('test-booking')
          ->withAllowTodayBooking($allowTodayBooking)
          ->withTimeslots($timeslots)
          ->withCurrentMonthTitle($currentMonth->format(__('F Y')))
          ->withCurrentMonthGrid($currentMonthGrid)
          ->withNextMonthTitle($nextMonth->format(__('F Y')))
          ->withNextMonthGrid($nextMonthGrid);
    }

    private function getGrid(Carbon $date) : array
    {
        $startDay = (clone $date)->startOfMonth()->startOfWeek(Carbon::SUNDAY);
        $today = Carbon::today();

        $grid = array();

        for ($perWeek = 0; $perWeek < 6; $perWeek++) {
            $week = array();

            for ($perDay = 0; $perDay < 7; $perDay++) {
                array_push($week, [ 'monthDay' => $startDay->day,
                                    'isToday' => $startDay->format('Y-m-d') === $today->format('Y-m-d'),
                                    'isCurMonth' => $startDay->format('Y-m') === $date->format('Y-m'),
                                    'date' => clone $startDay ]);
                $startDay->addDay();
            }
            array_push($grid, $week);
        }

        return $grid;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeslot_id = $request->input('timeslot_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        //$message = $request->input('message');
        Appointment::create([ 'timeslot_id' => $timeslot_id, 'name' => $name, 'phone' => $phone, /*'message' => $message*/ ]);

        $timeslot = Timeslot::find($timeslot_id);
        $date = $timeslot->date;
        $time = substr($timeslot->defaultTimeslot->time, 0, 5);

        return redirect()->route('test-booking', $this->locale)->with('status', __('You had booked') . ' ' . $date . ' ' . $time);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
