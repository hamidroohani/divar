@extends('layouts.temolate2')
<style>

    a:visited, a:active, a:hover, a:link {
        text-decoration: none;
    }

    image {
        height: 50%;
    }

    .acc_del {
        background-color: white;
    }

</style>
@section('content')
    @if(isset($users))
        <div class="col-lg-3" style="position: relative;left: 20%;top: 10%">
            <h2>List Of Users <span class="label label-primary pull-right" id="edit"><a href="#">Edit</a></span></h2>
            <br>
            <div class="container">
                <div class="row col-sm-8">
                    <form action="/admin-panel/users/delete" method="get">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{ $user->id }}" name="user_id[]">
                                        {{ $user->id }}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="btn-del">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if(isset($items))
        <div class="container">
            <div class="row">
                @foreach($items as $item)
                    @if(!$item->show)
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading centeralign">
                                    <h4>
                                    <span class="acc_del" style="float: right">
                                        <a href="/admin-panel/items/accept/{{ $item->id }}">Accept</a>
                                    </span>
                                        <a href="/information/{{ $item->id }}">{{$item->title}}</a>
                                    <span class="acc_del" style="float: left">
                                        <a href="/admin-panel/items/delete/{{ $item->id }}">Delete</a>
                                    </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <img src="{{ asset("storage/".$item->img_id) }}" class="img-responsive"
                                         style="width:100%;height: 50%" alt="This post has not picture">
                                </div>
                                <div class="panel-footer">
                                    <span style="float: right"><b>گروه :</b>{{$categories[$item->category_id-1]->title}}</span>
                                    <span style="position: absolute;left: 40%"><b>قیمت :</b>{{$item->price}}</span>
                                    <span style="float: left"><b>محله :</b>{{$item->position}}</span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    @if(isset($categories_c))
        <div class="col-lg-3" style="position: relative;left: 20%;top: 10%">
            <h2>List of Categories</h2><br>
            <div class="container">
                <div class="row col-sm-8">
                    <ul class="list-group" style="direction: rtl">
                        @foreach($categories_c as $category)
                            <li class="list-group-item">{{ $category->title }}
                                <span class="label label-danger pull-left">
                            <a href="/admin-panel/category/delete/{{ $category->id }}">Delete</a>
                        </span>
                                <span id="{{ $category->id }}" class="label label-info pull-left">
                            <a href="">Change</a>
                        </span><span id="{{ $category->id }}to"></span></li>
                        @endforeach
                    </ul>
                    <br>
                    <hr>
                    <h3>Add New One</h3>
                    <form action="/admin-panel/add_category" method="get">
                        <input type="text" style="direction: rtl" name="title" class="form-control"><br>
                        <input type="submit" class="form-control btn-primary" value="Add">
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if(isset($locations))
        <div class="col-lg-3" style="position: relative;left: 20%;top: 10%">
            <h2>List of Locations</h2><br>
            <div class="container">
                <div class="row col-sm-8">
                    <ul class="list-group" style="direction: rtl">
                        @foreach($locations as $location)
                            <li class="list-group-item">{{ $location->title }}
                                <span class="label label-danger pull-left">
                            <a href="/admin-panel/location/delete/{{ $location->id }}">Delete</a>
                        </span>
                                <span id="{{ $location->id }}" class="label label-info pull-left">
                            <a href="">Change</a>
                        </span><span id="{{ $location->id }}to"></span></li>
                        @endforeach
                    </ul>
                    <br>
                    <hr>
                    <h3>Add New One</h3>
                    <form action="/admin-panel/add_location" method="get">
                        <input type="text" name="title" style="direction: rtl" class="form-control"><br>
                        <input type="submit" class="form-control btn-primary" value="Add">
                    </form>
                </div>
            </div>
        </div>
    @endif

    <script>
        $(function () {
            $(".toggle").hide();
            $("#btn-del").hide();
            $('#edit').on('click', function () {
                $(".toggle").toggle(1000);
                $("#btn-del").toggle(1000);
            })
        })
    </script>
@endsection