<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timeslot_id', 'name', 'phone', /*'message',*/
    ];

    /**
     * Get the timeslot that owns the appointment.
     */
    public function timeslot()
    {
        return $this->belongsTo('App\Timeslot');
    }
}
