@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading centeralign">
                        <h3>{{$item->title}}</h3>
                    </div>
                    <div style="width: 100%" class="panel-body">
                        <div class="floatright">
                            <span><b>دسته بندی: </b></span>
                            <span>{{ $categories[$item->category_id-1]->title }}</span>
                        </div><hr><br>
                        <div class="floatright">
                            <span><b>قیمت: </b></span>
                            <span>{{ $item->price }}</span>
                        </div><hr><br>
                        <div class="floatright">
                            <span><b>توضیحات: </b></span>
                            <?php
                            $file = file_get_contents("note/{$item->id}file.txt");
                            ?>
                            <span>{{ $file }}</span>
                        </div><hr><br>
                        <div class="floatright">
                            <span><b>محدوده: </b></span>
                            <span>{{$item->position}}</span>
                        </div><hr><br>
                        <div class="floatright">
                            <span><b>اطلاعات تماس: </b></span>
                            <span>{{ $item->tel }}</span>
                        </div><hr><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-body">
                        <img src="{{ asset("storage/".$item->img_id) }}" class="img-responsive floatright" style="width: 400px;height: 450px" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection