<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        $data=Offer::all();

        return response()->json($data);

    }

    public function store(Request $request){
        $data=$request->all();

        $maintenance_id=$data['maintenance_id'];
        $desc=$data['desc'];


        $Offer=Offer::create([
            'maintenance_id'=>$maintenance_id,
            'desc'=>$desc,



        ]);
        return ($Offer);
    }

    public function destroy($Offer){

        return Offer::destroy($Offer);
    }


    public function update(Request $request,  $Offer)
    {
   
    }

}
