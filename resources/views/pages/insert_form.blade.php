@extends('layouts.template')
@section('content')
    <div style="display: flex;justify-content: center;align-items: center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading centeralign"><h4>ایجاد آگهی جدید</h4></div>
                        <div class="panel-body">
                            <br>
                            <form action="/insert" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control" name="title" style="text-align: center"
                                       placeholder="موضوع آگهی">
                                {{ csrf_field() }}
                                <br>
                                <br>
                                <label for="categories" class="floatright">:دسته بندی</label>
                                <select name="category_id" class="form-control" style="width: 40%;margin-left: 20%">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <br>
                                <label for="img_id" class="floatright">:افزودن عکس</label>
                                <input type="file" class="form-control" name="img_id" accept="image/*">
                                <br>
                                <label for="price" class="floatright">:قیمت </label>
                                <input type="number" name="price" class="form-control centeralign" placeholder="ریال">
                                <br>
                                <label for="tel" class="floatright">:اطلاعات تماس</label>
                                <input type="tel" name="tel" class="form-control centeralign" placeholder="09123456789">
                                <br>
                                <label for="textarea" class="floatright">:توضیحات</label>
                                <textarea name="textarea" class="form-control floatright"
                                          style="direction: rtl"placeholder=" توضیحات"></textarea>
                                <br>
                                <br><br><br>
                                <label for="position" class="floatright">:محدوده</label>
                                <select name="position" class="form-control" style="width: 40%;margin-left: 20%">
                                    @foreach($positions as $position)
                                        <option value="{{$position->title}}">{{$position->title}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button class="btn btn-primary">Save</button>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
@endsection()