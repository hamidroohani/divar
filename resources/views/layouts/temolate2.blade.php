<!DOCTYPE html>
<html lang="en">
<head>
    <title>دیوار</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/gif" href="{{ asset('img/logo.jpg') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
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
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-user"></span>
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <li><a href="/login"><span class="glyphicon glyphicon-user"></span>
                        Login
                    </a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav floatright" style="direction: rtl">
                <li><a href="/admin-panel/location"><b>Location</b></a></li>
                <li><a href="/admin-panel/category"><b>Categories</b></a></li>
                <li><a href="/admin-panel/users"><b>Users</b></a></li>
                <li><a href="/admin-panel/items"><b>Items</b></a></li>
                <li><a href="/admin-panel/order_items"><b>Order_Items</b></a></li>
                <li class="floatright"><a href="/"><b>Home</b></a></li>
            </ul>
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


<footer class="container-fluid text-center">
    <p>&COPY; <a href="/">Business Rental System</a>. All Rights Resreved 2018.</p>
</footer>
</body>
</html>
