<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\DoctorAvailability;
use App\Appointment;

class AppointmentController extends Controller
{
    public function makeAppointmentForm(){
        $departments = $this->getDepartments();
        // dd($departments);
        return view('front.pages.user.make-appointment',compact('departments'));
    }

    protected function getDepartments(){
        $departments = Department::get()->all();
        return $departments;
    }

    public function submitAppointment(Request $request){
        // dd($request);
        $appointmentID = DoctorAvailability::where('doctor_id',$request->doctor)->where('date', $request->date)->where('time', $request->time)->where('status',0)->get()->first();
        // dd($appointmentID);
        if(empty($appointmentID)){
            dd('Appointment already booked for that time');
        }
        
        $submit = Appointment::create([
            'user_id' => uniqid(),
            'hasAccount' => 0,
            'name' =>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'department'=>$request->department,
            'doctor'=>$request->doctor,
            'date'=>$request->date,
            'time'=>$request->time,
            'appointment_id'=>$appointmentID->appointment_id,
            ]);
        if($submit)
        {
            $appointmentID->update([
                'status' => 1,
            ]);
            dd('Appointment has been booked');
        }
        
    }
}
