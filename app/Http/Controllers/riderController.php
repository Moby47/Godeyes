<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rider;
use App\User;
use App\checkin;

use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

use App\Http\Resources\checkinResource as checkinres;

class riderController extends Controller
{
   /* public function createRider(Request $request)
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
    }*/


    public function checkIn(Request $request)
    {
         
        if(date("H") < 12){
        
            $time = "morning";
        //   $today = \carbon\carbon::today();
        $check = checkin::where('userId','=', $request->input('id'))
            ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
            ->select('custom_date')->pluck('custom_date')->first();
            if (empty($check))
            {
                //save
                $user = User::findorfail($request->input('id'));
             $save = new checkin;
             $save->userId = $request->input('id');
             $save->name = $user->name;
             $save->surname =  $user->surname;
             $save->captain = $request->input('Captain');
             $save->custom_date = date("Y-m-d");
             $save->time = $time;
             $save->save();
             return 1;
            }else{
               return ['status'=>47,'time'=>$time];
            }

        }elseif(date("H") > 11 && date("H") < 16){

            $time = "afternoon";
          
               return ['status'=>48,'time'=>$time];
           // }

        }elseif(date("H") >= 16){

         $time = "evening";
         $check = checkin::where('userId','=', $request->input('id'))
         ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
         ->select('custom_date')->pluck('custom_date')->first();
         if (empty($check))
         {
             //save
             $user = User::findorfail($request->input('id'));
          $save = new checkin;
          $save->userId = $request->input('id');
          $save->name = $user->name;
          $save->surname =  $user->surname;
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


    public function logs($id)
    {
        $log = checkin::where('userId','=', $id)->select('id','created_at','captain','time')->paginate(3);
        return checkinres::collection($log);   
    }


    public function logsCount($id)
    {
       return $log = checkin::where('userId','=', $id)->select('id')->count();
    }


   
    public function week($id)
    {
        $ago = \carbon\carbon::now()->subWeek();
        $now = \carbon\carbon::now();
        return $data = checkin::where('userId','=',$id)
        ->whereBetween('created_at',[$ago,$now])->pluck('id')->count();
    }

    public function month($id)
    {
        $ago = \carbon\carbon::now()->subMonth();
        $now = \carbon\carbon::now();
        return $data = checkin::where('userId','=',$id)
        ->whereBetween('created_at',[$ago,$now])->pluck('id')->count();
    }

    public function total($id)
    {
        return $data = checkin::where('userId','=',$id)->pluck('id')->count();
    }


    public function success($id)
    {
        $res = checkin::orderby('id','desc')->where('userId','=', $id)
        ->select('id','time','captain','created_at')->get()->take(1);
        return checkinres::collection($res);   
    }
 

    public function exportMyTrips($id) 
    {
          session(['id' => $id]);
          return Excel::download(new DataExport, 'My_Shuttlers_Trip_history.xlsx');

    }


}



class DataExport implements FromCollection{
    function collection()
    {
         $id =  session('id');

  return  $data = checkin::where('userId','=', $id)
 ->select('name','surname','captain','created_at','time')->get();
    }
}