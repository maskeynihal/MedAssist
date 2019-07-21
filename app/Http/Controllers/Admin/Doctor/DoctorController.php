<?php

namespace App\Http\Controllers\Admin\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Requests\DoctorRequest;
use App\User;
use App\Doctor;
use App\Department;
use App\DoctorSchedule;

use Hash;

class DoctorController extends Controller
{
    protected $weekDays;
    public function __construct()
    {
        $days = [
            ['name'=>'Sunday','status'=>''], ['name'=>'Monday', 'status'=>''], ['name'=>'Tuesday', 'status'=>''], ['name'=>'Wednesday', 'status'=>''], ['name'=>'Thrusday', 'status'=>''], ['name'=>'Friday', 'status'=>''], ['name'=>'Saturday', 'status'=>'']
        ];
        $this->weekDays = $days;
    }
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
        $doctors = Doctor::with('department','doctorSchedule','loginDetails:id,user_id,name')->get();
        return view('back.pages.show-doctors',compact('doctors'));
    }

    public function showProfile($username){
        $doctor = Doctor::with('department','doctorSchedule','loginDetails:id,user_id,name')->where('username',$username)->get()->first();
        // dd(empty($doctors));

        if(empty($doctor))
            return redirect()->route('show.all.doctor');

        $schedules = DoctorSchedule::where('doctor_id', $doctor->doctor_id)->get()->all();

        foreach ($schedules as $key => $schedule) {
            foreach($this->weekDays as $key=>$day){
                if($day['name']==$schedule->day)
                    $day[$key]['status']='disabled';
            }
        }

        return view('back.pages.profile-doctor', compact('doctor'))->with('weekDays', $this->weekDays);
    }

    public function addScheduleForm(Request $request, $username){
        // dd($request->toArray());
        $day = $request->day;
        $doctor = Doctor::where('username', $username)->with('loginDetails:name,user_id')->get()->first();
        if(empty($doctor))
            return redirect()->route('show.all.doctor');

        $schedule = DoctorSchedule::where('doctor_id', $doctor->doctor_id)->where('day', '<>', $request->day)->get()->all();
        // dd($schedule);
        //view return to form to fill schedule
        if($schedule == NULL)
            return view('back.pages.schedule-form',compact(['day', 'doctor']));

        return redirect()->route('show.all.doctor', compact('day'));
    }

    public function addSchedule(Request $request, $username){
        $doctor = Doctor::where('username', $username)->with('loginDetails:name,user_id')->get()->first();
        if(empty($doctor))
            return redirect()->route('show.all.doctor');

        $schedule = DoctorSchedule::where('doctor_id', $doctor->doctor_id)->where('day', $request->day)->get()->first();
        if(!empty($schedule))
            return redirect()->route('show.single.profile.doctor', $username)->with('error', 'Schedule for same Day is already added');
        
        $addSchedule = DoctorSchedule::create([
            'doctor_id'=>$doctor->doctor_id,
            'day' => $request->day,
            'starting_time'=>$request->starting_time,
            'ending_time'=>$request->ending_time
        ]);

        if($addSchedule){
            return redirect()->route('show.single.profile.doctor', $username)->with('success', 'Schedule is added');
        }

        return redirect()->route('show.single.profile.doctor', $username)->with('error', 'error in adding Schedule');
        dd($request->toArray());
    }
}
