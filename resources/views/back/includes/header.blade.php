@section('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class='mainContainer'>
        <div class='sidenav'>
            <div class="sideLogo">

            </div>
            <p class='user'>NISHAN KHANAL</p>
            Team Member

            <div class="sideLink_wrapper">

                <a href="#">DASHBOARD</a>
                <a href="#">USERS</a>
                <a href="{{route('show.all.doctor')}}">DOCTORS</a>
                <a href="#">LABS</a>
                <a href="#">CREATE NEW</a>

            </div>
        </div>
        <div class="mainContent">
            <div class="backMag">

            </div>
@endsection