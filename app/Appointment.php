<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
class Appointment extends Model
{
     protected $fillable = [
        'name',
        'email',
        'mobile',
        'department',
        'doctor',
        'date',
        'time',
        'user_id',
        'appointment_id'
    ];
     
}
