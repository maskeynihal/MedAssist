<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=[
        'doctor_id',
        'username',
        'department_id'
    ];

    public function department()
    {
    	return $this->hasOne(Department::class,'department_id','department_id');
    }

    public function loginDetails(){
        return $this->hasOne(User::class, 'user_id', 'doctor_id');
    }

    public function doctorSchedule()
    {
    	return $this->hasOne(DoctorSchedule::class,'doctor_id','doctor_id');
    }
}
