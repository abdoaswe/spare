<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function index(){

       $data=User::all();

       return response()->json(["users" =>$data],200);

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



       ///////////////validator form////////////////////
       


        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'city'=> 'required',
            'address'=> 'required',
            'gender'=> 'nullable',
            'phone'=> 'required',
            'role'=> ['required',Rule::in(['user','merchant','maintenance','admin'])],

        ]);


        if ($validator->fails())
         {
            return response()->json($validator->errors(), 400);

        }



        ///////////////////store data /////////////////////



       $User=User::create([
        'name'=>$request['name'],
        'email'=>$request['email'],
        'password'=> Hash::make($request['password']),
        'city'=>$request['city'],
        'address'=>$request['address'],
        'gender'=>$request['gender'],
        'phone'=>$request['phone'],
        'role'=>$request['role'],



      ]);

      return response()->json(
        "User registertion is done ",200 );
    }

    /**
     * Display the specified resource.
     */

    public function show($Userid)
    {
       $data= User::find($Userid);

        return response()->json(["user" =>$data],200);
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
    public function update(Request $request, string $id)
    {



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= User::destroy($id);

        return response()->json('Delete is done',200);

    }

}
