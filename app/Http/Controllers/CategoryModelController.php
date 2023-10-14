<?php

namespace App\Http\Controllers;

use App\Models\Categorymodel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categorymodel::all();
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

        $model=$data['model'];
        $year=$data['year'];

        $storeData= Categorymodel::create(["model"=>$model,"year"=>$year]);


        return ($storeData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorymodel $categorymodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorymodel $categorymodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorymodel $categorymodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $categorymodel)
    {
        return  Categorymodel::destroy($categorymodel);
    }
}
