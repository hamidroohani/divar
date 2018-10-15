@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading centeralign"><h4>اطلاعات کاربری </h4></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <span style="float: right;color: green"><b>!!شما وارد شده اید</b></span>
                        <br>
                        <br>
                        <ul class="list-group" style="direction: rtl">
                            <li class="list-group-item">
                                <label for=""><b>نام :</b></label>
                                 <span style="margin-right: 50%">{{ Auth::user()->name }}</span>
                            </li>
                            <li class="list-group-item">
                                <label for="">نام کاربری :</label>
                                 <span style="margin-right: 40%">{{ Auth::user()->email }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
