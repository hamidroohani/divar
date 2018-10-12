<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view("pages.categories",compact('categories'));
    }

    public function show_categories($id)
    {
        $items = DB::table('items')->where("category_id",$id)->get();
        $categories = Category::all();
        return view('pages.categories',compact('items','categories'));
    }
}
