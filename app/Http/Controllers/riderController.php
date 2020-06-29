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
         //save
         $save = new checkin;
         $save->name = $request->input('Name');
         $save->surname = $request->input('Surname');
         $save->captain = $request->input('Captain');
         $save->save();
         return 1;
    }


    public function logs($surname)
    {
        $log = checkin::where('surname','=', $surname)->select('id','created_at','captain')->paginate(3);
        return checkinres::collection($log);   
    }

   
 
}
