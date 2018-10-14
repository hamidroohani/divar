@extends("layouts.template")
<style>
    image {
        height: 50%;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            @foreach(Auth()->user()->items as $item)
                @if(!$item->show)
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading centeralign">
                                <a href="/information/{{ $item->id }}">
                                    <h4>{{$item->title}}</h4>
                                </a>
                            </div>
                            <div class="panel-body">
                                <img src="{{ asset("storage/".$item->img_id) }}" class="img-responsive"
                                     style="width:100%;height: 50%" alt="Image">
                            </div>
                            <div class="panel-footer">
                                <span style="float: right"><b>گروه :</b>{{$categories[$item->category_id-1]->title}}</span>
                                <span style="position: absolute;left: 40%"><b>قیمت :</b>{{$item->price}}</span>
                                <span style="float: left"><b>محله :</b>{{$item->position}}</span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-footer centeralign" style="background-color: red;color: white">
                                <em><b>
                                        در انتظار تایید ناظر
                                </b></em>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>



    <div class="container">
        <div class="row">
            <?php
            $items = Auth()->user()->items;
            ?>
            @for($i = (count($items)) - 1; $i >= 0; $i--)
                @if($items[$i]->show)
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading centeralign">
                                <a href="/information/{{ $items[$i]->id }}">
                                    <h4>{{$items[$i]->title}}</h4>
                                </a>
                            </div>
                            <div class="panel-body">
                                <img src="{{ asset("storage/".$items[$i]->img_id) }}" class="img-responsive"
                                     style="width:100%;height: 50%" alt="Image">
                            </div>
                            <div class="panel-footer">
                                <span style="float: right"><b>گروه :</b>{{$categories[$items[$i]->category_id-1]->title}}</span>
                                <span style="position: absolute;left: 40%"><b>قیمت :</b>{{$items[$i]->price}}</span>
                                <span style="float: left"><b>محله :</b>{{$items[$i]->position}}</span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
@endsection