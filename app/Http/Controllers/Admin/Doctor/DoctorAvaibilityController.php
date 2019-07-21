<?php

namespace App\Http\Controllers\Admin\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\DoctorSchedule;
use App\DoctorAvailability;


class DoctorAvaibilityController extends Controller
{
    public function insertAvailability(){
        // die();
        $doctors = DoctorSchedule::get();
        $expire = $this->expireStatus();
        foreach($doctors as $doctor)
        {
            $date = $this->calculateDateFromDay($doctor->day);
            // dd($date);
            $doctorAvailable = DoctorAvailability::where('doctor_id',$doctor->doctor_id)->where('date','<=',$date)->get()->all();
            if($doctorAvailable){
                continue;
            }
            if($doctorAvailable == Null){
                 for($cTime = $doctor->starting_time; $cTime <= $doctor->ending_time; $cTime=Carbon::parse($cTime)->addMinutes(30)->format('H:i:s')){
            //     if(!empty($doctorAvailable)){
            //         break;
            //    } 
                $insert = DoctorAvailability::create([
                    'appointment_id' => uniqid(),
                    'doctor_id'      => $doctor->doctor_id,
                    'day'            => $doctor->day,
                    'date'           => $date,
                    'time'           => $cTime,
                    'status'         => 0
                    ]);
                    echo "<pre>";
                    var_dump($insert->toArray());
                }
            }
        }
        die;
        // return true;
    }

        protected function calculateDateFromDay($day){
        $todayDate = Carbon::today()->format('Y-m-d');
        $todayDay = Carbon::now()->format('l');
        
        $dayCheck = $todayDay;
        $getDate = $todayDate;

        while($dayCheck != $day)
        {
            $dayCheck = Carbon::parse($dayCheck)->addDay(1)->format('l');
            $getDate = Carbon::parse($getDate)->addDay(1)->format('Y-m-d');
        }
        return $getDate;
    }

    public function expireStatus(){
        // dd(Carbon::now());
        $expired = DoctorAvailability::where('status','<>',1)->where('status','<>','expired')->get();
        foreach($expired as $e)
        {
            if($e->date < Carbon::now()->toDateString()){
                $e->update([
                    'status' => 'expired',
                ]);
            }
            elseif($e->date == Carbon::now()->toDateString()){
                if(date('Y-m-d H:i:s', strtotime("$e->date $e->time")) < Carbon::now()){
                    $e->update([
                        'status' => 'expired',
                    ]);
                }
            }
        }
        return true;
    }
}
