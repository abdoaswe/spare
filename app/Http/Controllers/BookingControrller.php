<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingControrller extends Controller
{
    public function index(){
        $data=Booking::all();

        return response()->json($data);

    }
    public function store(Request $request){
                $id=auth()->user()->id;

        $data=$request->all();
        $maintenance_id=$data['maintenance_id'];
        // $user_id=$data['user_id'];
        $desc=$data['desc'];
        $date=$data['date'];
        $Booking=Booking::create([
            'maintenance_id'=>$maintenance_id,
            'user_id'=>$id,
            'desc'=>$desc,
            'date'=>$date,
        ]);


        return response()->json([
            'massage'=>"data stored"
        ],200);

    }
    public function update(Request $request,$Booking){

        $BookinUpdate=Booking::find($Booking);
        $BookinUpdate->$desc=$request->desc;
        $BookinUpdate->$date=$request->date;


    }
    public function destroy($Booking){
      return Booking::destroy($Booking);
    }

}
