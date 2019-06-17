<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'default_timeslot_id',
    ];
    
    /**
     * Get the default timeslot that owns the timeslot.
     */
    public function defaultTimeslot()
    {
        return $this->belongsTo('App\DefaultTimeslot');
    }

    /**
     * Get the appointments for the timeslot.
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
