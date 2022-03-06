<?php

namespace App\Http\Controllers\Fornt;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function showLading(){
        return view('landing');
    }

    public function showabout(){
        return view('about');
    }
}
