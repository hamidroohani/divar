@extends('layouts.template')
<style>
    image {
        height: 50%;
    }
</style>
@section('content')
    <div class="container">
        @if(Session()->has('message'))
            <div class="alert alert-success"><b>{{Session('message')}}</b></div>
        @endif
        <div class="row">
            @for($i = (count($items)) - 1; $i >= 0; $i--)
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading centeralign">
                            <a href="/information/{{ $items[$i]->id }}">
                                <h4>{{$items[$i]->title}}</h4>
                            </a>
                        </div>
                        <div class="panel-body">
                            {{--                            {{ dd(\Illuminate\Support\Facades\Storage::get('avatar/avatar.jpg')) }}--}}
                            <img src="{{ asset("storage/".$items[$i]->img_id) }}" class="img-responsive"
                                 style="width:100%;height: 50%" alt="This post has not picture">
                        </div>
                        <div class="panel-footer">
                            <span style="float: right"><b>گروه :</b>{{$categories[$items[$i]->category_id-1]->title}}</span>
                            <span style="margin: 0 40px"><b>قیمت :</b>{{$items[$i]->price}}</span>
                            <span style="float: left"><b>محله :</b>{{$items[$i]->position}}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
