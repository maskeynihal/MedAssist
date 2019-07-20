<?php

namespace App\Http\Controllers\Admin\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Requests\DoctorRequest;
use App\User;
use App\Doctor;
use App\Department;

use Hash;

class DoctorController extends Controller
{
    public function index(){
        $departments = Department::get()->all();
        return view('back.pages.add-doctor',compact('departments'));
    }
    public function addDoctor(Request $request)
    {
        $doctor = $this->makeDoctorLogin($request);

        if(!$doctor)
            return redirect()->route('doctor.add.index')->with('error', 'Doctor Cannot Be added');
        
        $addDoc = Doctor::create([
            'doctor_id'     => $doctor->user_id,
            'username'      => $request->username,
            'department_id' => $request->department_id
        ]);
        
       if(!$addDoc){
           return redirect()->route('doctor.add.index')->with('error', 'Doctor Cannot Be added');
       }
        
       return redirect()->route('doctor.add.index')->with('success', 'Doctor Added');
    }

    private function makeDoctorLogin($request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'user_id' => uniqid(),
            'password' => Hash::make($request->password),
            'role'  => 'doctor',
        ]);

        if($user)
            return $user;
        
        return false;
    }

    public function showDoctor(){
        return view('back.pages.show-doctors');
    }

    public function showProfile($username){
        $doctors = Doctor::with('department','doctorSchedule','loginDetails:id,user_id,name')->where('username',$username)->get();
        return $doctor;
    }
}
