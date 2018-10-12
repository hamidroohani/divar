<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function about_us()
    {
        return view('pages.aboutus');
    }
}
