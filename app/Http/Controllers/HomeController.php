<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Timeslot;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$data = Timeslot::with('defaultTimeslot')->where('date', '>=', Carbon::today())->get();
        //return view('home')->withData($data);
        return view('_home');
    }

    public function calendar()
    {
        $currentMonth = $this->getGrid(Carbon::today());
        $nextMonth = $this->getGrid(Carbon::today()->addMonth());
        $timeslots = Timeslot::doesntHave('appointments')->with('defaultTimeslot')->where('date', '>=', Carbon::today())->get();
        return view('calendar')->withCurrentMonth($currentMonth)->withNextMonth($nextMonth)->withTimeslots($timeslots);
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

        return [ 'date' => $date, 'grid' => $grid ];
    }
}
