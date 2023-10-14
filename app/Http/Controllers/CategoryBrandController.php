<?php

namespace App\Http\Controllers;

use App\Models\Categorybrand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categorybrand::all();
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
        $data=$request->all();

        $brand=$data['brand'];

        $storeData= Categorybrand::create(["brand"=>$brand]);


        return ($storeData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorybrand $categorybrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorybrand $categorybrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorybrand $categorybrand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $categorybrand)
    {
        return  Categorybrand::destroy($categorybrand);

    }
}
