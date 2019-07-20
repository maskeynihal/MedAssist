<?php

namespace App\Http\Controllers\Api\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Doctor;

class DoctorController extends Controller
{
    public function getDoctor(){
        $doctors = Doctor::with('department','doctorSchedule','loginDetails:id,user_id,name')->get();
        // $doctors = json_encode()
        return $doctors;
    }
}
