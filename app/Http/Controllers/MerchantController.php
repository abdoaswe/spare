<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Product;




class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function showall(){
      return  $merchant= Merchant::all();

     }



    public function index()
    {
         $merchant=Merchant::paginate(3);
       return response()->json(['merchant'=>$merchant]);
       
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
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'city'=> 'required',
            'address'=> 'required',
            'gender'=> ['required',Rule::in(['male','female'])],
            'phone'=> 'required',
            'role'=> ['required',Rule::in(['user','merchant','maintenance','admin'])],
            'idm'=>'required|unique:merchant|digits:14',
            'idmfront'=>'required',
            'idmback'=>'required',
            'crmfront'=>'required',
            'crmback'=>'required',
        ]);
        if ($validator->fails())
         {
            return response()->json($validator->errors(), 400);

        }

        /////////////////////////////store data User //////////////////////////////////


          $user=User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=> Hash::make($request['password']),
            'city'=>$request['city'],
            'address'=>$request['address'],
            'gender'=>$request['gender'],
            'phone'=>$request['phone'],
            'role'=>$request['role'],
            'status' => $request['status']
               
          ]);



        /////////////////////////////save images //////////////////////////////////


        $request["idmfront"]->storeAs("public/img", $request["idmfront"]->getClientOriginalName());
        $idmfront= $request["idmfront"]->getClientOriginalName();

        $request["idmback"]->storeAs("public/img", $request["idmback"]->getClientOriginalName());
        $idmback= $request["idmback"]->getClientOriginalName();

        $request["crmfront"]->storeAs("public/img", $request["crmfront"]->getClientOriginalName());
        $crmfront= $request["crmfront"]->getClientOriginalName();

        $request["crmback"]->storeAs("public/img", $request["crmback"]->getClientOriginalName());
        $crmback= $request["crmback"]->getClientOriginalName();        
       
      
        /////////////////////////////store data Merchant //////////////////////////////////

        $maincenter = Merchant::create([
            'user_id' =>$user->id,
            'idm'=>$request['idm'],
            'idmfront'=>$idmfront,
            'idmback'=>$idmback,
            'crmfront'=>$crmfront,
            'crmback'=>$crmback,
        ]);
         return response()->json(['done',200]);


       


        
    }

    /**
     * Display the specified resource.
     */

     //SHOW MerchantProduct
    public function show()
    {
        
         $id=auth()->user()->marchant->id;

         $merchant=Product::where("merchant_id",$id)->get() ;  
         
         return response()->json($merchant);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, $merchant)
    {
        $merchantupdate= Merchant::find($merchant);

        $merchantupdate->idm=$request->idm;
        $merchantupdate->idmfront=$request->idmfront;
        $merchantupdate->idmback=$request->idmback;
        $merchantupdate->crmfront=$request->crmfront;
        $merchantupdate->crmback=$request->crmback;





         $merchantupdate->save();
         return response()->json("Update merchant is done ",200 );
    }

    /**
     * Remove the specified resource from storage.
     */



    public function destroy($merchant)
    {
        return  Merchant::destroy($merchant);

    }





    public function archive(){
        $archive=Merchant::onlyTrashed()->get();
        return  response()->json(["Archive"=>$archive]);
    }




    public function restore(Request $request,Merchant $id){
        $id->restore();
        return response()->json( "restore merchant is done ",200 );
    }
}
