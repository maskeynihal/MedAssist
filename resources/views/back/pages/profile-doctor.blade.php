@extends('back.layouts.master')
@section('content')
<h1>Single Doctor Profile</h1>
<h2>{{$doctor->loginDetails->name}}</h2>
@if (Session::get('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif
@if (Session::get('success'))
    <div class="alert alert-danger">
        {{Session::get('success')}}
    </div>
@endif
    @foreach ($weekDays as $item)
    <form action="{{route('show.add.schedule.form',$doctor->username)}}" method="post">
        @csrf
        <input type="hidden" name="day" value="{{$item['name']}}" class={{$item['status']}}>
        <button type="submit">{{$item['name']}}</button>
    </form>
    @endforeach
@endsection