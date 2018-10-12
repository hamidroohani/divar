<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<style>

    a:visited, a:active, a:hover, a:link {
        color: white;
        text-decoration: none;
    }
</style>
@include('pages.sidebar')
@if(isset($users))
    <div class="col-lg-3" style="position: relative;left: 20%;top: 10%">
        <h2>List Of Users <span class="label label-primary pull-right" id="edit"><a href="#">Edit</a></span></h2><br>
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
    <div class="col-lg-3" style="position: relative;left: 20%;top: 10%">
        <h2>List Of Items <span class="label label-primary pull-right" id="edit"><a href="#">Edit</a></span></h2><br>
        <div class="container">
            <div class="row col-sm-8">
                <form action="/admin-panel/items/delete" method="get">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Telephone</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $item->id }}" name="items_id[]">
                                    {{ $item->id }}
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->tel }}</td>
                                <td>{{ $item->price }}</td>
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

@if(isset($categories))
    <div class="col-lg-3" style="position: relative;left: 20%;top: 10%">
        <h2>List of Categories</h2><br>
        <div class="container">
            <div class="row col-sm-8">
                <ul class="list-group" style="direction: rtl">
                    @foreach($categories as $category)
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
        $("input:checkbox").hide();
        $("#btn-del").hide();
        $('#edit').on('click', function () {
            $("input:checkbox").toggle(1000);
            $("#btn-del").toggle(1000);
        })
    })
</script>