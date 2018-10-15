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
                    <?php
                    $mytime = \Carbon\Carbon::now();
                    $diff_Min = $mytime->diffInMinutes($item->created_at);
                    $diff_Hourse = $mytime->diffInHours($item->created_at);
                    $diff_Day = $mytime->diffInDays($item->created_at);
                    $diff_Mon = $mytime->diffInMonths($item->created_at);
                    ?>
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
                                <span class="time_font">
                                @if($diff_Mon >= 1)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Mon }}<span> ماه پیش</span></span>
                                    @elseif($diff_Day >= 1 && $diff_Day < 30)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Day }}<span> روز پیش</span></span>
                                    @elseif($diff_Hourse >= 1 && $diff_Hourse < 24)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Hourse }}
                                            <span> ساعت پیش</span></span>
                                    @elseif($diff_Min >= 1 && $diff_Min < 60)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Min }}<span> دقیقه پیش</span></span>
                                    @elseif($diff_Min < 1)
                                        <span style="position: absolute;left: 40%">لحظاتی پیش</span>
                                    @endif
                                </span>
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
                    <?php
                    $mytime = \Carbon\Carbon::now();
                    $diff_Min = $mytime->diffInMinutes($items[$i]->created_at);
                    $diff_Hourse = $mytime->diffInHours($items[$i]->created_at);
                    $diff_Day = $mytime->diffInDays($items[$i]->created_at);
                    $diff_Mon = $mytime->diffInMonths($items[$i]->created_at);
                    ?>
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
                                <span class="time_font">
                                @if($diff_Mon >= 1)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Mon }}<span> ماه پیش</span></span>
                                    @elseif($diff_Day >= 1 && $diff_Day < 30)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Day }}<span> روز پیش</span></span>
                                    @elseif($diff_Hourse >= 1 && $diff_Hourse < 24)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Hourse }}
                                            <span> ساعت پیش</span></span>
                                    @elseif($diff_Min >= 1 && $diff_Min < 60)
                                        <span style="position: absolute;left: 40%;direction: rtl">{{ $diff_Min }}<span> دقیقه پیش</span></span>
                                    @elseif($diff_Min < 1)
                                        <span style="position: absolute;left: 40%">لحظاتی پیش</span>
                                    @endif
                                </span>
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