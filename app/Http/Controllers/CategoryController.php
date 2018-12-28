<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view("pages.categories", compact('categories'));
    }

    public function show_categories($id)
    {
        if (isset($id) && ctype_digit($id)) {


            $categ_items = Item::where('category_id', '=', $id)->orderBy('created_at', 'DESC')->get();
            $categories = Category::all();
            return view('pages.categories', compact('categ_items', 'categories'));
        }else{
            echo "لطفا درست وارد کنید";
        }


    }
}
