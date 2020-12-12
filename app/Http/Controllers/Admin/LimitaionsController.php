<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Limitaion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LimitaionsController extends Controller
{
    public function index(){
        $limitaions = Limitaion::All();
        return view('admin.limitaions.index',compact('limitaions'));
    }

    public function edit($id){
        $limitaion = Limitaion::find($id);
        return view('admin.limitaions.edit',compact('limitaion'));
    }

    public function update(Request $request){
        $limitaion = Limitaion::find($request->id);
        $limitaion->limit = $request->limit;
        $limitaion->save();
        $limitaions = Limitaion::All();
        return view('admin.limitaions.index',compact('limitaions'));
    }
}
