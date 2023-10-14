<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Provided_service;

class Provided_ServiceController extends Controller
{
    public function index()
    {
        $data=Provided_Service::all();
        return response()->json(["Provided_Service"=>$data],200);


    }



    public function store(Request $request){

       $service=Provided_Service::create(
        [
            'maintenance_id'=>$request['maintenance_id'],
            'services'=>$request['services'],
        ]);


        return response()->json(
            "Provided_Service has been stored ",200 );


    }




    public function destroy($service){



        $data= Provided_Service::destroy($service);

        return response()->json('Provided_Service is done',200);

    }
}
