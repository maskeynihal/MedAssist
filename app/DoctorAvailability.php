<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAvailability extends Model
{
    protected $fillable=[
            'appointment_id', 'doctor_id','day','status','user_id', 'date', 'time'
    ];

    public function doctorSchedule()
    {
        return $this->hasOne(DoctorSchedule::class,'doctor_id','doctor_id');
    }
}
