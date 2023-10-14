<?php

namespace App\Http\Controllers;

use App\Models\ProductRate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data= ProductRate::all();

       return response()->json(["ProductRate"=>$data],200);
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
        $data = ProductRate::create([
            'star_rating' => $request['star_rating'],
            'comments' => $request['comments'],
            'product_id' => $request['product_id'],
            'user_id' => $request['user_id'],

        ]);

        return response()->json(
            "ProductRate has been stored ",200 );
    }

    /**
     * Display the specified resource.
     */
    public function show( $productRate)
    {
        $data= ProductRate::find($productRate);

       return response()->json(["ProductRate"=>$data],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductRate $productRate)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductRate $productRate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $productRate)
    {
        $data= ProductRate::destroy($productRate);

        return response()->json('Delete ProductRate is done',200);
    }
}
