<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SecondController extends Controller
{
    //
    public function __construct()
    {
    //     (تنفيذ ال middleware على كل الميثود )
    //       (لاخراج ميثود من middleware نستخدم except  )
        $this->middleware('auth')->except('showString1');
    }

    public function showString1(){
       echo 'welcome to app 1';
    }

    public function showString2(){
        echo 'welcome to app 2';
    }

    public function showString3(){
        echo 'welcome to app 3';
    }

}
