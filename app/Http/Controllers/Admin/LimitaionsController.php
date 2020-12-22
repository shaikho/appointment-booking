<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Limitaion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Holiday;

class LimitaionsController extends Controller
{
    public function index(){
        $limitaions = Limitaion::All();
        $holidays = Holiday::All();
        return view('admin.limitaions.index',compact('limitaions','holidays'));
    }

    public function edit($id){
        $limitaion = Limitaion::find($id);
        $holidays = Holiday::All();
        return view('admin.limitaions.edit',compact('limitaion','holidays'));
    }

    public function update(Request $request){
        // return $request;
        // dd($request);
        $workingdays = [];
        if($request->id == 1){
            $limitaion = Limitaion::find($request->id);
            if(empty($request->sat)){
                array_push($workingdays,6);
            }
            if(empty($request->sun)){
                array_push($workingdays,0);
            }
            if(empty($request->mon)){
                array_push($workingdays,1);
            }
            if(empty($request->thu)){
                array_push($workingdays,2);
            }
            if(empty($request->wed)){
                array_push($workingdays,3);
            }
            if(empty($request->thr)){
                array_push($workingdays,4);
            }
            if(empty($request->fri)){
                array_push($workingdays,5);
            }
            $limitaion->limit = $workingdays;
            $limitaion->save();
        }else if($request->id == 4){
            $holiday = new Holiday;
            $holiday->date = $request->date;
            $holiday->save();
        }
        else{
            $limitaion = Limitaion::find($request->id);
            $limitaion->limit = $request->limit;
            $limitaion->save();
        }

        $limitaions = Limitaion::All();
        $holidays = Holiday::All();

        return view('admin.limitaions.index',compact('limitaions','holidays'));
    }

    public function addglobalholidays(){
        $holidays = Holiday::All();
        // return $holidays;
        return view('admin.limitaions.addglobalholidays',compact('holidays'));
    }

    public function deleteholiday($id){
        $holiday = Holiday::find($id);
        $holiday->delete();

        $holidays = Holiday::All();
        return view('admin.limitaions.addglobalholidays',compact('holidays'));
    }
}
