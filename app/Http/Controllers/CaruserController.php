<?php

namespace App\Http\Controllers;

use \App\Models\CarUser;
use Illuminate\Http\Request;
 use Illuminate\Http\Response;

class CaruserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CarUser::all();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {




        $User = CarUser::create([
            'brand' => $request['brand'],
            'model' => $request['model'],
            'year' => $request['year'],
            'user_id' => $request['user_id'],


        ]);

        return response()->json(
            "CarUser has been Stored",200 );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data=CarUser::find($id);

        return response()->json(
           [ "caruser"=>$data],200 );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
          $caruser= CarUser::find($id);

          $caruser->brand=$request->brand;
          $caruser->model=$request->model;
          $caruser->year=$request->year;
         $caruser->user_id=$request->user_id;


           $caruser->save();



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $Data= CarUser::destroy($id);


       return response()->json(
        "Delete Caruser is done ",200 );


    }
}
