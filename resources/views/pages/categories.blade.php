@extends('layouts.template')
<style>
    image {
        height: 50%;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
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
                                <li class="form-control floatright">
                                    <a href="/categories/{{ $category->id }}">{{$category->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" style="float: left">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(isset($categ_items))
                            <div class="row">
                                @if(count($categ_items) == 0)
                                    <h4><p class="centeralign" style="color: red">!!هنوز هیچ آگهی در این زمینه ارسال
                                            نشده</p></h4>
                                @endif
                                @foreach($categ_items as $item)
                                    @if($item->show)
                                        <?php
                                        $mytime = \Carbon\Carbon::now();
                                        $diff_Min = $mytime->diffInMinutes($item->created_at);
                                        $diff_Hourse = $mytime->diffInHours($item->created_at);
                                        $diff_Day = $mytime->diffInDays($item->created_at);
                                        $diff_Mon = $mytime->diffInMonths($item->created_at);
                                        ?>
                                        <div class="col-lg-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading centeralign">
                                                    <a href="/information/{{ $item->id }}">
                                                        <h4>{{$item->title}}</h4>
                                                    </a>
                                                </div>
                                                <div class="panel-body">
                                                    <img src="{{ asset('storage/'. $item->img_id) }}"
                                                         class="img-responsive"
                                                         style="width:100%;height: 40%" alt="Image">
                                                </div>
                                                <div class="panel-footer">
                                                    <span style="float: right"><b>گروه :</b>{{$categories[$item->category_id-1]->title}}</span>
                                                    <span class="time_font">
                                                    @if($diff_Mon >= 1)
                                                            <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Mon }}
                                                                <span> ماه پیش</span></span>
                                                        @elseif($diff_Day >= 1 && $diff_Day < 30)
                                                            <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Day }}
                                                                <span> روز پیش</span></span>
                                                        @elseif($diff_Hourse >= 1 && $diff_Hourse < 24)
                                                            <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Hourse }}
                                                                <span> ساعت پیش</span></span>
                                                        @elseif($diff_Min >= 1 && $diff_Min < 60)
                                                            <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Min }}
                                                                <span> دقیقه پیش</span></span>
                                                        @elseif($diff_Min < 1)
                                                            <span style="position: absolute;left: 40%">لحظاتی پیش</span>
                                                        @endif
                                                    </span>
                                                    <span style="float: left"><b>محله :</b>{{$item->position}}</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    @endif
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