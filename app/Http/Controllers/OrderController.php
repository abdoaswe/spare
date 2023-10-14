<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        $data= Order::paginate(4);

        return response()->json(["order"=>$data],200);

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

        $data = Order::create([

            'user_id' => $request['user_id'],

            'total_price' => $request['total_price'],



        ]);

        return($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($order)
    {
        $data=Order::find($order);

        return ($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $order)
    {
        
        return order::destroy($order);
    }
    public function archive(){
        $archive=Order::onlyTrashed()->get();
        return  response()->json(['Archive'=>$archive]);

    }
    public function restore(Request $request,Order $id){
        $id->restore();
        return response()->json( "restore MaintenanceCenter is done ",200 );
    }
}
