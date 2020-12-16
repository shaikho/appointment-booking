<?php

namespace App\Http\Controllers\Admin;

use Debugbar;
use Session;
use App\User;

class HomeController
{
    public function index()
    {
        if(Session::has('role')){
            $role = Session::get('role');
            if(strcmp($role,"2") == 0){
                return view('custome.customerhome');
            }
        }
        return view('home');
    }

    
}
