<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_deteils extends Model
{
    use HasFactory;

    protected $table ="order_deteils";

    protected $fillable=["product_id","order_id","number","price" , "merchant_id"];


    public function order()
    {

     return $this->belongsTo(order_::class,$foriegnkey='order_id');

    }


    public function product()
    {
     return $this->belongsTo(product::class,$foriegnkey='product_id');
    }
    

    public function merchant()
    {
     return $this->hasMany(product::class);
    }

    public function merchantid()
    {
     return $this->belongsTo(Merchant::class,'merchant_id');
    }




}
