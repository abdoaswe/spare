<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\MainCentersRate;
use App\Models\MaintenanceCenters;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\UserController;
use App\Models\User;

class MaintenanceCentersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function ShowAllMen()
     {
            $data=MaintenanceCenters::all();
 
            return response()->json(
             ['mainCenters'=>$data]
            );
     }
 

    public function index()
    {
           $data=MaintenanceCenters::paginate(2);

           return response()->json(
            ['mainCenters'=>$data]
           );
    }

//     public function showuser()
//     {
//         $id=auth()->user()->maincentar;
//         dd($id);


// return response()->json(
//             ['mainCenters'=>$id]
//            );
//     }
    

 

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
        /////////////////////////////store images //////////////////////////////////
        $request["idmcfront"]->storeAs("public/img", $request["idmcfront"]->getClientOriginalName());
        $idmcfront= $request["idmcfront"]->getClientOriginalName();

        $request["idmcback"]->storeAs("public/img", $request["idmcback"]->getClientOriginalName());
        $idmcback= $request["idmcback"]->getClientOriginalName();

        $request["crmcfront"]->storeAs("public/img", $request["crmcfront"]->getClientOriginalName());
        $crmcfront= $request["crmcfront"]->getClientOriginalName();

        $request["crmcback"]->storeAs("public/img", $request["crmcback"]->getClientOriginalName());
        $crmcback= $request["crmcback"]->getClientOriginalName();


       /////////////////////////////////////store data /////////////////////////////////


        $maincenter=MaintenanceCenters::create([
            'user_id' =>$user->id,
            'idmc'=>$request['idmc'],
            'idmcfront'=>$idmcfront,
            'idmcback'=>$idmcback,
           'crmcfront'=>$request["crmcfront"]->getClientOriginalName(),
          'crmcback'=> $crmcback,

        ]);

         return response()->json($maincenter);


    }

    /**
     * Display the specified resource.
     */
    public function show($maintenanceCenters)
    {
          $data=MaintenanceCenters::find($maintenanceCenters);

          return response()->json(['maincenter'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaintenanceCenters $maintenanceCenters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)

    {
         $id=auth()->user()->maincentar;

       $request=request()->all();

        /////////////////////////////update images //////////////////////////////////

        $request["img_logo"]->storeAs("public/img", $request["img_logo"]->getClientOriginalName());
        $img_logo= $request["img_logo"]->getClientOriginalName();

        $request["img_cover"]->storeAs("public/img", $request["img_cover"]->getClientOriginalName());
        $img_cover= $request["img_cover"]->getClientOriginalName();

        /////////////////////////////update data //////////////////////////////////

      $id->update(['center_name'=>$request['center_name'],
     'city'=>$request['city'],
      'address'=>$request['address'],
      'user_id'=>$id->user_id,
        'img_logo'=> $img_logo,
         'img_cover'=> $img_cover,
          'desc'=>$request['desc'],
           'start_day'=>$request['start_day'],
           'end_day'=>$request['end_day'],
           'start_time'=>$request['start_time'],
            'end_time'=>$request['end_time'],


     ]);

         return response()->json(
           ["massege"=>"Update MaintenanceCenter is done "],200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $maintenanceCenters)
    {
         $data=MaintenanceCenters::destroy($maintenanceCenters);
         return response()->json("Delete MaintenanceCenter is done ",200 );
    }
    public function archive(){
        $archive=MaintenanceCenters::onlyTrashed()->get();
        return  response()->json(["Archive"=>$archive]);
    }
    public function restore(Request $request,MaintenanceCenters $id){
        $id->restore();
        return response()->json( "restore MaintenanceCenter is done ",200 );
    }





    public function MaintanShow(){
        $id=auth()->user()->maincentar;
        return response()->json(
            ['mainCenters'=>$id]);

    }
}
