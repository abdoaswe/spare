<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;


class CardController extends Controller
{

//   public function Allcarts(){

//     $card=auth()->user()->card;
//     foreach ($card as $value) {
//   $value->product;
// }
// $countcard=count($card);

// return response()->json(['Card'=>$card]);



//   }
    public function index()

    {
       
      // $id = auth()->user()->id;
      
      $card=auth()->user()->card;
      // dd($card);
          foreach ($card as $value) {
            $value->product;
          }
          


            //  $data= DB::table("card")
        // ->Join("product", function($join){

        //     $join->on("card.product_id", "=", "product.id");
        // })
        // ->select("product.name", "card.product_id", "product.img")
        // ->groupBy("product.name", "card.product_id", "product.img")
        // ->get();
          
       
          $countcard=count($card);

          return response()->json(['Card'=>$card]

        );



    }


    public function store(Request $request)
    {
            $total=0;
        $total= $request["number"]*$request['price'];


            $id=auth()->user()->id;
             $data=auth()->user()->card;
           
           $cardnumber=$request['number'];
           $flag=true;
         foreach ($data as $item ) {

          if($request['product_id']==$item['product_id']){
            $total= $request["number"]*$item['price'];


           $item->update(['number'=>$request['number'],'totalPrice'=>$total]);
           $flag=false;
          }
          }
      

          if($flag){
        
        $data=Card::create(['user_id'=>$id,
        'product_id'=>$request['product_id'],
        'number'=>$request['number'],
        'price'=>$request['price'],
        'totalPrice'=>$request['totalPrice']]);

          }
}


public function multistore(Request $request)
{
  $id=auth()->user()->id;

  $data=$request->all();
  $cards=Card::where('user_id',$id)?Card::where('user_id',$id)->get():[];
 if(empty($cards)){
 
  foreach($data as $item)
{
 
Card::create(['user_id'=>$id,
'product_id'=>$item['product_id'],
'number'=>$item['number'],
'price'=>$item['price'],
'totalPrice'=>$item['totalPrice']]);
}
// }
}else {
  foreach($cards as $card){
    $card->delete();


  }

  foreach($data as $item)
  {
   
  Card::create(['user_id'=>$id,
  'product_id'=>$item['product_id'],
  'number'=>$item['number'],
  'price'=>$item['price'],
  'totalPrice'=>$item['totalPrice']]);
  }

}



}





      public function update($card,$num){

        $cardupdate= Card::find($card);
        // $cardupdate->product_id=$request->product_id;
        // $cardupdate->user_id=$request->user_id;

        // $number= $cardupdate->number=$request->number;
        // $price= $cardupdate->price=$request->price;

        $total=$num*$cardupdate->price;
        $cardupdate->update(['totalPrice'=>$total,"number"=>$num]);
        return response()->json(
         ["massege"=>"yuhjiko"]);


    }


    public function destroy( $card)
    {
            $data=Card::destroy($card);

            return response()->json(
                "Delete Card is done ",200 );




    }
    public function destroyall( )
    {
            $data=auth()->user()->card;

            foreach ($data as $card) {
            $card->delete();
            }

            return response()->json(
                "Delete Card is done ",200 );




    }


    public function show( $id)
    {
            $data=Card::where('user_id',$id)->get();

            return response()->json(
                $data,200 );
    }

}




