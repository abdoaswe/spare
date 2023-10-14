<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\MaintenanceCenters;
use App\Models\MainCentersRate;
use App\Models\Merchant;


use App\Http\Controllers\Controller;

use Doctrine\Common\Lexer\Token;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Tymon\JWTAuth\Contracts\Providers\Auth;
use App\Http\Controllers\JWTAuth;
use App\Http\Controllers\JWTFactory;
use App\Http\Controllers\AuthController;
use App\Models\order_deteils;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\DB;
use PhpParser\Lexer\TokenEmulator\ReverseEmulator;

class WebController extends Controller
{

    public function product()
    {
    $data=product::all();
    $user=User::all();
    return (compact("data","user"));
    }



    public function store(Request $request)
    {

        $id = auth()->user()->id;
        $card = auth()->user()->card;
        $total=0;
        foreach($card as $price){

           $total+=$price['totalPrice'];
        }

          $order = Order::create([

            'user_id' => $id ,
            'total_price' => $total

        ]);

        $products=Product::all();
        $idmer='';
        foreach ($products as $item ) {

           $idmer= $item->merchant_id ;

       }
        foreach($card as $card){

            $order_deteils=order_deteils::create([
                'order_id'=>$order['id'],
                'product_id'=>$card->product_id,
                'price'=>$card->price,
                'number'=>$card->number,
                'merchant_id'=>$idmer


            ]);

            $cards = auth()->user()->card;


            foreach ($cards as $item) {
                $item->delete();
                }

        }


        // $card=auth()->user()->card;




    }

    public function filter($id)
    {
     $data=Product::where("categories_id",$id)->get();


     return  response()->json($data, 200);
    }




     public function filterBrand($id)
    {
     $data=Product::where("category_brand_id",$id)->get();


     return  response()->json($data, 200);
    }

    public function rates (Request $request,$id){

       
                $data= MainCentersRate::where('maintenance_id',$id)->get();
                $totalrates=0;
                $countrate=0;
                $avg=0;
                foreach($data as $rate){
                    $totalrates+=$rate->star_rating;
                      $countrate=count($data);
        
                }
                if($countrate != 0)
                  $avg= $totalrates/$countrate;
        
             return response()->json($avg);
        
            }
            public function CityFilter($id){
        
                return MaintenanceCenters::where("city","like","%".$id."%")->get();
            }
        
             public function storecity (Request $request){
        
                    $data=city::create([
        
                        'city'=>$request['city']
        
                    ]);
        
                  return response(['message'=>"store sucess"]);
            }
        public function show(){
        
                $data=city::all();
                return response()->json($data);
            }

    public function search ($name){

        return Product::where("name","like","%".$name."%")->get();
    }

    public function searchprice ($price){

        return Product::where("price","like","%".$price."%")->get();
    }


    
    public function searchUser ($id){

        return Merchant::where("id","like","%".$id."%")->get();
    }


      
    public function searchCostomer ($name){

        return User::where("name","like","%".$name."%")->get();
    }
}
