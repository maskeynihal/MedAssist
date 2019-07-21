@extends('back.layouts.master')
@section('content')
<div class="main">
    <h3 class="pageHeader">
        SCHDEDULING
    </h3>
</div>
<div className="Card">
    <div class="card">
        <div class="card-header">Doctor Schedule</div>
        <div class="card-body">
            <form method="POST" action="{{route('schedule.add', $doctor->username)}}">
                @csrf
                <h4>
                   Scheduling for <strong> DR. {{$doctor->loginDetails->name}}</strong>
                </h4>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Day</label>
                    <div class="col-sm-10">
                        <select class="custom-select custom-select-md mb-1" name="day">
                            <option selected>Choose a day</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thrusday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label class="col-form-label">Starting Time</label>
                        <input type="time" class="form-control" name="starting_time"/>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-form-label">End Time</label>
                        <input type="time" class="form-control" name="ending_time"/>
                    </div>
                </div>

                <button type="submit">Add Schedule</button>
            </form>
        </div>
    </div>
</div>
@endsection