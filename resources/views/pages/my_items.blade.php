@extends("layouts.template")
<style>
    image{
        height: 50%;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            ?>
            @foreach(Auth()->user()->items as $item)
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading centeralign">
                            <a href="/information/{{ $item->id }}">
                                <h4>{{$item->title}}</h4>
                            </a>
                        </div>
                        <div class="panel-body">
                            <img src="{{ asset("storage/".$item->img_id) }}" class="img-responsive" style="width:100%;height: 50%" alt="Image">
                        </div>
                        <div class="panel-footer">
                            <span style="float: right"><b>گروه :</b>{{$categories[$item->category_id-1]->title}}</span>
                            <span style="margin: 0 40px"><b>قیمت :</b>{{$item->price}}</span>
                            <span style="float: left"><b>محله :</b>{{$item->position}}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php
                $i++;
                ?>
            @endforeach
        </div>
    </div>
@endsection