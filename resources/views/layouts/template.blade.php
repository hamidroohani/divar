<!DOCTYPE html>
<html lang="en">
<head>
    <title>دیوار</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/gif" href="{{ asset('img/logo.jpg') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--styles--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    {{--fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href='http://www.fontonline.ir/css/BRoya.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/Shams.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/Mj_Silicon.css' rel='stylesheet' type='text/css'>

    {{--scripts--}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        $(function () {
            $('div.alert').delay(4000).slideUp(4000);
        })
    </script>

    <style type="text/css">
        body {
            font-family: Montserrat, BYekan;
        }

        .time_font {
            font-family: BRoya;
        }
    </style>
    <style>
        .alert {
            position: fixed;
            left: 10px;
            bottom: 10px;
            z-index: 10;
        }

        a:hover {
            text-decoration: none;
        }

        .search {
            width: 100px;
            height: 30px;
            margin: 10px 0;
            margin-right: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        .search:focus {
            width: 120px;
        }

        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: silver;
            padding: 25px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <button class="navbar-brand" data-toggle="modal" data-target="#myModal">Logo</button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="/login"><span class="glyphicon glyphicon-user"></span>
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                    class="glyphicon glyphicon-user"></span>
                            <b> خروج</b>
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li><a href="/login"><span class="glyphicon glyphicon-user"></span>
                            <b> ورود</b>
                        </a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav floatright" style="direction: rtl">
                <li><a href="/aboutus"><b>درباره ما</b></a></li>
                <li><a href="/insert_form"><span style="color: red"><b>ایجاد آگهی جدید</b></span></a></li>
                <li><a href="/my_items"><b>آگهی های من</b></a></li>
                <li><a href="/categories"><b>دسته بندی</b></a></li>
                <li class="floatright" ><a href="/"><b>خانه</b></a></li>
            </ul>
            <form action="/search_items" method="get">
                <input type="text" name="search" class="search" style='float:right;direction:rtl' placeholder="جستجو..">
                <button type="submit" style='float:right;direction:rtl;margin-top: 10px;height: 30px'>
                    <i class="fa fa-search"></i>
                </button>
            </form>

        </div>
    </div>
</nav>
@yield('content')
<br><br>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Divar Logo</h4>
            </div>
            <div class="modal-body centeralign">
                <img src="{{ asset('img/logo.jpg') }}" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@if(Session()->has('message'))
    <div class="alert alert-success"><b>{{Session('message')}}</b></div>
@endif

@if(count($errors))
    <div class="alert alert-danger">Error:{{$errors->first()}}</div>
@endif
<footer class="container-fluid text-center">
    <p>&COPY; <a href="/">Business Rental System</a>. All Rights Resreved 2018.</p>
</footer>
</body>
</html>
