<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;

use App\Models\Merchant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
 use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ProductAll(){
        $product=Product::all();


        return response()->json($product);

    }
    public function index()
    {
         $product=Product::paginate(4);


         return response()->json([$product]);


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

    /////////////////////////////save images Product //////////////////////////////////

        $id=auth()->user()->marchant->id;
        $request["img"]->storeAs("public/img", $request["img"]->getClientOriginalName());
        $imgname= $request["img"]->getClientOriginalName();

    /////////////////////////////store data Product //////////////////////////////////

        $Productstore = Product::create([

            'name' => $request['name'],
            'made' => $request['made'],
            'price' => $request['price'],
            'type' => $request['type'],
            'img' => $imgname,
            'desc' => $request['desc'],
            'star_rating' => $request['star_rating'],
            'comments' => $request['comments'],
            'categories_id' => $request['categories_id'],
            'category_model_id' => $request['category_model_id'],
            'category_brand_id' => $request['category_brand_id'],
            'merchant_id' => $id,



        ]);


        return($Productstore);
    }

    /**
     * Display the specified resource.
     */
    public function show( $product)
    {
        return Product::find($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $product)
    {
        $request["img"]->storeAs("public/img", $request["img"]->getClientOriginalName());
        $imgname= $request["img"]->getClientOriginalName();
        $productupdate= Product::find($product);

        $productupdate->name=$request->name;
        $productupdate->made=$request->made;
        $productupdate->price=$request->price;
        $productupdate->type=$request->type;
        $productupdate->img=$imgname;
        $productupdate->desc=$request->desc;
        $productupdate->star_rating=$request->star_rating;
        $productupdate->comments=$request->comments;
        $productupdate->categories_id=$request->categories_id;
        $productupdate->category_model_id=$request->category_model_id;
        $productupdate->category_brand_id=$request->category_brand_id;
        $productupdate->merchant_id=$request->merchant_id;





         $productupdate->save();
         return response()->json("updete done",200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $product)

    {

        return Product::destroy($product);
    }
    public function archive(){

        $id=auth()->user()->marchant->id;
        $archive=product::where('merchant_id',$id)->onlyTrashed()->get();
        
        return  response()->json(["Archive"=>$archive]);

    }
    public function restore(Request $request,product $id){
        $id->restore();
        return response()->json( "restore product is done ",200 );
    }

   
    public function Adminarchive(){
        $archive=Product::onlyTrashed()->get();
        return  response()->json(["Archive"=>$archive]);
    }

    
}
