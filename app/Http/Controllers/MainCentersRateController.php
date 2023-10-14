<?php

namespace App\Http\Controllers;

use App\Models\MainCentersRate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainCentersRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MainCentersRate::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id=auth()->user()->id;

       $mainratestore = MainCentersRate::create([

            'user_id' => $id,
            'maintenance_id' => $request['maintenance_id'],
            'star_rating' => $request['star_rating'],
            'comments' => $request['comments']

        ]);


        return response()->json(
            " MainCentersRate is Has been stored ",200 );
    }

    /**
     * Display the specified resource.
     */
    public function show(MainCentersRate $MainCentersRate)
    {
 $data=MainCentersRate::find($mainCentersRate);

       return response()->json(["centerRate"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainCentersRate $mainCentersRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $mainCentersRate)
    {
       $mainupdate= MainCentersRate::find($mainCentersRate);

        $mainupdate->user_id=$request->user_id;
        $mainupdate->maintenance_id=$request->maintenance_id;
        $mainupdate->star_rating=$request->star_rating;
        $mainupdate->comments=$request->comments;





         $mainupdate->save();

         return response()->json(
            "Update MaintenanceCenterRate is done ",200 );
         }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $mainCentersRate)
    {
        $data= MainCentersRate::destroy($mainCentersRate);

        return response()->json(
            "Delete MaintenanceCenterRate is done ",200 );
    }
}
