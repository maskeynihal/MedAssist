<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $fillable=[
      'doctor_id','day','starting_time','ending_time'
    ];
}
