<?php

namespace App\Http\Controllers\Fornt;

use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function showUserName(){
        return 'Ahmed Atef';
    }

    public function getIndex(){
        //pass of array
        $data=['a'=>'ahmed','b'=>'atef','age'=>30,'city'=>'minya'];
        //pass of object
        $obj=new \stdClass();
        $obj->na='ahmed';
        $obj->ci='cairo';
        return view('welcome',compact('obj','data'));
    }
}
