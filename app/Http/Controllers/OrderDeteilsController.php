<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_deteils;

class OrderDeteilsController extends Controller
{
    public function index()
    {
        $data=order_deteils::all();
        
        return response()->json($data);

    }

    public function ordermerchant()
    {        

        $id=auth()->user()->marchant->id;
           
         $merchant=order_deteils::where("merchant_id",$id)->get() ;  

         return response()->json($merchant);

    }
    
}
