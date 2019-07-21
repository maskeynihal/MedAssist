@section('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/swiper.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<header className="site-header">
    <div className="nav-bar">
        <div className="container">
            <div className="row">
                <div className="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div className="site-branding d-flex align-items-center">
                        <a className="d-block" href="/web" rel="home"><img className="d-block" src={logo} alt="logo" /></a>
                    </div>
    
                    <nav className="site-navigation d-flex justify-content-end align-items-center">
                        <ul className="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
    
                            <li className="call-btn button gradient-bg mt-3 mt-md-0">
                                <a className="d-flex justify-content-center align-items-center" href="#"><img src={phone} />
                                    +34 586 778 8892</a>
                            </li>
                        </ul>
                    </nav>
    
                    <div className="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
