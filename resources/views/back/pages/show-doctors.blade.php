@extends('back.layouts.master')
@section('content')
<div class="card">
    @foreach($doctors as $doctor)
    <a href="{{route('show.single.profile.doctor', $doctor->username)}}">{{$doctor->username}}</a>
        <br>
    @endforeach
</div>
@endsection