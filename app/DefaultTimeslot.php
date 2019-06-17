<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultTimeslot extends Model
{
    /**
     * Get the timeslots for the default timeslot.
     */
    public function timeslots()
    {
        return $this->hasMany('App\Timeslot');
    }
}
