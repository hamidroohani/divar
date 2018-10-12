<?php

namespace App\Http\Controllers;

use App\Category;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin-panel');
    }

    public function users()
    {
        $users = DB::table('users')->get();
        return view('pages.admin-panel',compact('users'));
    }

    public function delete_users(Request $request)
    {
        DB::table('users')->where('id',$request->user_id)->delete();
        return back();
    }

    public function items()
    {
        $items = DB::table('items')->get();
        return view('pages.admin-panel',compact('items'));
    }

    public function delete_items(Request $request)
    {
        DB::table('items')->where('id',$request->items_id)->delete();
        return back();
    }

    public function categories()
    {
        $categories = DB::table('categories')->get();
        return view('pages.admin-panel',compact('categories'));
    }

    public function add_category(Request $request)
    {
        $category = new Category($request->all());
        $category->save();
        return back();
    }

    public function del_category($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return back();
    }

    public function location()
    {
        $locations = DB::table('positions')->get();
        return view('pages.admin-panel',compact('locations'));
    }

    public function add_location(Request $request)
    {
        $location = new Position($request->all());
        $location->save();
        return back();
    }

    public function del_location($id)
    {
        DB::table('positions')->where('id',$id)->delete();
        return back();
    }
}
