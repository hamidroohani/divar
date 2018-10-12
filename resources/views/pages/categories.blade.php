@extends('layouts.template')
<style>
    image {
        height: 50%;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 floatright">
                <div class="panel">
                    <div class="panel-heading floatright">
                        <h4>دسته بندی ها</h4>
                    </div>
                    <div class="panel-body">
                        <hr>
                        <ul class="form-control" style="direction: rtl">
                            <br>
                            <br>
                            @foreach($categories as $category)
                                <li class="form-control floatright"><a
                                            href="/categories/{{ $category->id }}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(isset($items))
                            <div class="row">
                                <?php
                                $i = 0;
                                ?>
                                @if(count($items) == 0)
                                        <h4><p class="centeralign" style="color: red">!!هنوز هیچ آگهی در این زمینه ارسال نشده</p></h4>
                                @endif
                                @foreach($items as $item)
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading centeralign">
                                                <a href="/information/{{ $item->id }}">
                                                    <h4>{{$item->title}}</h4>
                                                </a>
                                            </div>
                                            <div class="panel-body">
                                                <img src="{{ asset('storage/'. $item->img_id) }}" class="img-responsive"
                                                     style="width:100%;height: 40%" alt="Image">
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
                        @else
                            <h4><p class="centeralign">لطفا یک دسته بندی را انتخاب کنید</p></h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection