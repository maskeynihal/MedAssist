<?php

namespace App\Http\Controllers\Api\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Doctor;
use App\DoctorAvailability;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function getDoctor(){
        $doctors = Doctor::with('department','doctorSchedule','loginDetails:id,user_id,name')->get();
        // $doctors = json_encode()
        return $doctors;
    }

    public function getDoctors(Request $request)
    {
        if(empty($request))
        {
            return 'No data Found';
        }

        $doctors = Doctor::with('department','loginDetails:id,user_id,name')->where('department_id', $request->departmentId)->get()->all();
        // dd($doctors);
        if(empty($doctors))
            return 'No data Found';
        
        return $doctors;
    }

    public function test(){
        $availableDate = DoctorAvailability::get();
        return $availableDate;
    }
    public function getAvailableDate(Request $request){
        // dd($request);
        $availableDate = DoctorAvailability::where('doctor_id', $request->doctorId)->where('date', '>=', Carbon::now()->toDateString())->where('status',0)->select('date')->distinct()->get()->all();

        if(empty($availableDate)){
            return 'No data Found';
        }
        return $availableDate;
    }

    public function getAvailableTime(Request $request){
        $availableTime = DoctorAvailability::where('doctor_id', $request->doctorId)->where('date', $request->date)->where('status', 0)->select('time')->get()->all();

        if(empty($availableTime))
        {
            return 'No data Found';
        }
        return $availableTime;
    }
}
