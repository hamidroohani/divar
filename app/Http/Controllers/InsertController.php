<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InsertController extends Controller
{
    public function insert_form()
    {
        $categories = Category::all();
        $positions = Position::all();
        return view('pages.insert_form',compact('categories','positions'));
    }

    public function insert(Request $request)
    {
        $this->validate($request,[
            'title' => "required|min:3|max:30",
            'price' => 'required|max:12',
            'textarea' => 'required',
            'tel' => 'required|min:10|max:11',
        ]);
        $item = new Item($request->all());
        $item->category_id = $request->category_id;
        $item->position = $request->position;
        $item->price = $request->price;
        $item->tel = $request->tel;
        if ($request->img_id)
        {
            $path = request()->file('img_id')->store('avatar');
            $item->img_id = "{$path}";
        }else{
            $item->img_id = "avatar/sample.jpg";
        }
        Auth::user()->items()->save($item);
        $str = $request->textarea;
        $handler = fopen("note/{$item->id}file.txt","a+");
        fwrite($handler,$str);
        echo fread($handler,1024);
        fclose($handler);
        Session::flash('message','آگهی با موفقیت ارسال شد');
        return redirect('/');

    }
}
