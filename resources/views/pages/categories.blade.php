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
                                @if(count($items) == 0)
                                    <h4><p class="centeralign" style="color: red">!!هنوز هیچ آگهی در این زمینه ارسال
                                            نشده</p></h4>
                                @endif
                                @for($i = (count($items)) - 1; $i >= 0; $i--)
                                    @if($items[$i]->show)
                                        <div class="col-lg-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading centeralign">
                                                    <a href="/information/{{ $items[$i]->id }}">
                                                        <h4>{{$items[$i]->title}}</h4>
                                                    </a>
                                                </div>
                                                <div class="panel-body">
                                                    <img src="{{ asset('storage/'. $items[$i]->img_id) }}"
                                                         class="img-responsive"
                                                         style="width:100%;height: 40%" alt="Image">
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
                        @else
                            <h4><p class="centeralign">لطفا یک دسته بندی را انتخاب کنید</p></h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection