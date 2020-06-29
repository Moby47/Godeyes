<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\captain;

//Api resource
use App\Http\Resources\captainResource as capres;

class captainController extends Controller
{
    public function getCaptains(Request $request)
    {
        $res = captain::select('name','surname','id')->get();
        return capres::collection($res);   
    }

    public function addCaptain(Request $request)
    {
          //save
          $save = new captain;
          $save->name = $request->input('Name');
          $save->surname = $request->input('Surname');
          $save->save();
          return 1;  
    }
}
