<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\captain;
use App\checkin;
use App\User;

use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Facades\Excel;

//Api resource
use App\Http\Resources\captainResource as capres;
use App\Http\Resources\checkinResource as checkinres;

class captainController extends Controller
{
    public function getCaptains(Request $request)
    {
        $res = user::where('state','=',1)->select('name','surname','id','route')->get();
        return capres::collection($res);   
    }

    public function addCaptain(Request $request)
    {
            //create
       $user = new User;
       $user->name = $request->input('name');
       $user->surname = $request->input('surname');
       $user->email = $request->input('email');
       $user->route = $request->input('route');
       $user->state = $request->input('state');
       $user->password = bcrypt($request->password);
       $user->save();
       
        //response
        return 1;
    }


    public function morning($fullname)
    {
         $time = "morning";
         $check = checkin::where('captain','=',$fullname)
         ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
         ->select('name', 'surname','id', 'created_at')->get();   
         return checkinres::collection($check);   
    }

    public function morningCount($fullname)
    {
         $time = "morning";
       return  $check = checkin::where('captain','=',$fullname)
       ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
         ->select('name')->count();   
    }


    public function evening($fullname)
    {
        $time = "evening";
      $check = checkin::where('captain','=',$fullname)
      ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
          ->select('name', 'surname','id', 'created_at')->get(); 
          return checkinres::collection($check);
    }

    public function eveningCount($fullname)
    {
        $time = "evening";
        return  $check = checkin::where('captain','=',$fullname)
        ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
          ->select('name')->count(); 
    }


    public function checkin(Request $request)
    { 
        $surname = $request->input('surname');
       $userid = user::where('name','=',$request->input('name'))->where('surname','=',$surname)->where('state','=',0)->select('id')
        ->pluck('id')->first();

        if(empty($userid)){
            return ['status'=>49];
        }

        if(date("H") < 12){
        
            $time = "morning";
        //   $today = \carbon\carbon::today();
        $check = checkin::where('userId','=', $userid)
            ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
            ->select('custom_date')->pluck('custom_date')->first();
            if (empty($check))
            {
                //save
                $user = User::findorfail($userid);
             $save = new checkin;
             $save->userId = $userid;
             $save->name = $user->name;
             $save->surname =  $user->surname;
             $save->captain = $request->input('captain');
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

        }elseif(date("H") > 17){

         $time = "evening";
         $check = checkin::where('userId','=', $userid)
         ->where('custom_date','=', date("Y-m-d"))->where('time','=', $time)
         ->select('custom_date')->pluck('custom_date')->first();
         if (empty($check))
         {
             //save
             $user = User::findorfail($userid);
          $save = new checkin;
          $save->userId = $userid;
          $save->name = $user->name;
          $save->surname =  $user->surname;
          $save->captain = $request->input('captain');
          $save->custom_date = date("Y-m-d");
          $save->time = $time;
          $save->save();
          return 1;
         }else{
            return ['status'=>47,'time'=>$time];
         }
        }
    }




    public function allLogs($fullname){
        $log = checkin::where('captain','=',$fullname)
        ->select('id','name','surname','created_at','captain','time')->paginate(10);
        return checkinres::collection($log);  
    }


    public function allLogsFiltered($from,$to,$fullname){
        $log = checkin::where('captain','=',$fullname)
        ->whereBetween('created_at',[$from,$to])->select('id','name','surname','created_at','captain','time')->paginate(1);
        return checkinres::collection($log);  
    }



    public function export($from,$to,$fullname) 
    {
        /*
        $type = 'csv';
       // {
           // try{
               $from = '2020-07-08 08:11:19';
               $to = '2020-07-12 15:53:33';
           $data = checkin:: whereBetween('created_at',[$from,$to])
            ->select('name','surname','captain','created_at','time')->get()->toArray();
                //    $data = User::get()->toArray();
          //  }
            
           // catch(\Exception $e){
            
            //    return 'Error! Users Table Not Retrieved';
           // }//catch end
            
           // try{
                    return Excel::create('Shuttlers_Passengers', function($excel) use ($data) {
            
                        $excel->sheet('Passengers Records', function($sheet) use ($data)
            
                        {
            
                            $sheet->fromArray($data);
            
                        });
            
                    })->download($type);
            //    }
            
           // catch(\Exception $e){
            
          //      return 'Error! Download Failed';
           // }//catch end
          //      }
          */
          session(['from' => $from]);
          session(['to' => $to]);
          session(['fullname' => $fullname]);
          return Excel::download(new DataExport, 'Shuttlers_Passengers.xlsx');

    }


}


class DataExport implements FromCollection{
        function collection()
        {
             $from =  session('from');
            $to = session('to');
            $fullname = session('fullname');

      return  $data = checkin::where('captain','=',$fullname)
      ->whereBetween('created_at',[$from,$to])
     ->select('name','surname','captain','created_at','time')->get();//->toArray();
        }
}