@extends('front.layouts.master')
@section('content')
<div class="our-departmentsx">
    <div class="container">
        <div class="card">
            <div class="card-header">Appointment</div>
            <div class="card-body">
                <form method="POST" action="{{route('make.appointment')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Name" name="name"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Email" name="email"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Mobile" name="mobile" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Department</label>
                            <select name="department" placeholder="Department" id="department">
                                <option value="">Select Department</option>
                                @foreach ($departments as $dept)
                                <option value="{{$dept->department_id}}">{{$dept->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Doctors</label>
                            <select name="doctor" placeholder="doctor" id="doctor"></select>
                            {{-- //here data comes from ajax --}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Appointment Date</label>
                            <select name="date" id="date"></select>
                            {{-- <input id="datepicker" type="date"  class="form-control" id="date" name="datepicker" placeholder="Date" required> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Appointment Time</label>
                            <select name="time" id="time" class="form-control"></select>
                            {{-- <input id="time" type="time"  class="form-control" name="time" placeholder="Time" required> --}}
                        </div>
                    </div>

                    <button type="submit"> Make Appointment </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#department').change(function () {
            var selectedDepartmentId = $(this).val();
            console.log(selectedDepartmentId);
            $.ajax({
                url: "api/get-doctors",
                method: "GET",
                data: {
                    departmentId: selectedDepartmentId
                },
                success: function (doctors) {
                    console.log(doctors);
                    let parentObject = $('#doctor');
                    if (doctors == 'No data Found') {
                        parentObject.html('<option> Select Another Department</option>');
                    } else {
                        parentObject.html('');//to delete previous data on that html;
                        // parentObject.empty();
                        parentObject.append('<option value=""> Select Doctor</option>');
                        doctors.forEach((doctor) => {
                            parentObject.append('<option value="' + doctor.doctor_id + '">' + doctor.login_details.name + '</option>')
                        });
                    }
                },
                error: function () {
                    let parentObject = $('#doctor');
                    parentObject.html('No Doctor Found');
                    console.log('No data can be found');
                }

            });
        })
    })

</script>
<script>
    $(document).ready(function () {
        $('#doctor').change(function () {
            var selectedDoctorId = $(this).val();
            console.log(selectedDoctorId);
            $.ajax({
                url: "api/get-available-date",
                method: "GET",
                data: {
                    doctorId: selectedDoctorId
                },
                success: function (times) {
                    console.log(times);
                    let parentObject = $('#date');
                    if (date == 'No data Found') {
                        parentObject.html('<option> Select Another Doctor</option>');
                    } else {
                        parentObject.html('');//to delete previous data on that html;
                        // parentObject.empty();
                        parentObject.append('<option value=""> Select Date</option>');
                        times.forEach((time) => {
                            parentObject.append('<option value="' + time.date + '">' + time.date + '</option>');
                        });
                    }
                },
                error: function () {
                    let parentObject = $('#date');
                    parentObject.html('No Time Found');
                    console.log('No time can be found');
                }

            });
        })
    })
</script>
<script>
    $(document).ready(function () {
        $('#date').change(function () {
            var selectedDoctorId = $('#doctor').val();
            var selectedDate = $(this).val();
            console.log(selectedDoctorId);
            $.ajax({
                url: "api/get-available-time",
                method: "GET",
                data: {
                    doctorId: selectedDoctorId,
                    date: selectedDate
                },
                success: function (times) {
                    console.log(times);
                    let parentObject = $('#time');
                    if (date == 'No data Found') {
                        parentObject.html('<option> Select Another Date</option>');
                    } else {
                        parentObject.html('');//to delete previous data on that html;
                        // parentObject.empty();
                        parentObject.append('<option value=""> Select Time</option>');
                        times.forEach((time) => {
                            parentObject.append('<option value="' + time.time + '">' + time.time + '</option>');
                        });
                    }
                },
                error: function () {
                    let parentObject = $('#date');
                    parentObject.html('No Time Found');
                    console.log('No time can be found');
                }

            });
        })
    })
</script>
@endsection