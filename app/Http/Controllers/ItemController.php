<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function show()
    {
        $items = Item::latest($column = 'created_at')->get();
        $categories = Category::all();
        return view('index',compact('items','categories'));
    }

    public function information($id)
    {
        $item = DB::table('items')->where('id',$id)->get();
        $item = $item[0];
        $categories = Category::all();
        if($item->show)
        {
            return view('pages.info',compact('item','categories'));
        }elseif (Auth::check() && Auth::user()->id == $item->user_id)
        {
            return view('pages.info',compact('item','categories'));
        }
        return back();
    }

    public function my_items()
    {
        $categories = Category::all();
        return view('pages.my_items',compact('categories'));
    }

    public function search_item(Request $request)
    {
        $this->validate($request,[
            'search' => 'required|min:4'
        ]);
        $items = DB::table('items')
            ->where('title', 'like', "%{$request->search}%")
            ->orderBy('created_at','desc')
            ->get();
        $categories = Category::all();
        return view('pages.search',compact('items','categories'));
    }

}
