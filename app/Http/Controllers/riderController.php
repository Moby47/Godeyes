<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rider;
use App\checkin;

use App\Http\Resources\checkinResource as checkinres;

class riderController extends Controller
{
    public function createRider(Request $request)
    {
    $check = rider::where('surname','=', $request->input('Surname'))->select('id')->pluck('id')->first();
        if (!empty($check))
        {
            //edit
            $edit = rider::findorfail($check);
            $edit->name = $request->input('Name');
            $edit->surname = $request->input('Surname');
            $edit->email = $request->input('Email'); 
            $edit->save();
            return 1;
        }else{
            //save
            $save = new rider;
            $save->name = $request->input('Name');
            $save->surname = $request->input('Surname');
            $save->email = $request->input('Email');
            $save->save();
            return 1;
        }
    }


    public function checkIn(Request $request)
    {
         
        if(date("H") < 12){
        
            $time = "morning";
        //   $today = \carbon\carbon::today();
        $check = checkin::where('surname','=', $request->input('Surname'))
            ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
            ->select('custom_date')->pluck('custom_date')->first();
            if (empty($check))
            {
                //save
             $save = new checkin;
             $save->name = $request->input('Name');
             $save->surname = $request->input('Surname');
             $save->captain = $request->input('Captain');
             $save->custom_date = date("Y-m-d");
             $save->time = $time;
             $save->save();
             return 1;
            }else{
               return ['status'=>47,'time'=>$time];
            }

        }elseif(date("H") > 11 && date("H") < 15){

            $time = "afternoon";
            $check = checkin::where('surname','=', $request->input('Surname'))
            ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
            ->select('custom_date')->pluck('custom_date')->first();
            if (empty($check))
            {
                //save
             $save = new checkin;
             $save->name = $request->input('Name');
             $save->surname = $request->input('Surname');
             $save->captain = $request->input('Captain');
             $save->custom_date = date("Y-m-d");
             $save->time = $time;
             $save->save();
             return 1;
            }else{
               return ['status'=>47,'time'=>$time];
            }

        }elseif(date("H") > 16){

         $time = "evening";
         $check = checkin::where('surname','=', $request->input('Surname'))
         ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
         ->select('custom_date')->pluck('custom_date')->first();
         if (empty($check))
         {
             //save
          $save = new checkin;
          $save->name = $request->input('Name');
          $save->surname = $request->input('Surname');
          $save->captain = $request->input('Captain');
          $save->custom_date = date("Y-m-d");
          $save->time = $time;
          $save->save();
          return 1;
         }else{
            return ['status'=>47,'time'=>$time];
         }
        }
        
         
    }


    public function logs($surname)
    {
        $log = checkin::where('surname','=', $surname)->select('id','created_at','captain','time')->paginate(3);
        return checkinres::collection($log);   
    }

   
    public function week($surname)
    {
        $ago = \carbon\carbon::now()->subWeek();
        $now = \carbon\carbon::now();
        return $data = checkin::where('surname','=',$surname)
        ->whereBetween('created_at',[$ago,$now])->pluck('surname')->count();
    }

    public function month($surname)
    {
        $ago = \carbon\carbon::now()->subMonth();
        $now = \carbon\carbon::now();
        return $data = checkin::where('surname','=',$surname)
        ->whereBetween('created_at',[$ago,$now])->pluck('surname')->count();
    }

    public function total($surname)
    {
        return $data = checkin::where('surname','=',$surname)->pluck('surname')->count();
    }
 
}
