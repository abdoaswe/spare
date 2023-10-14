<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRate extends Model
{
    use HasFactory;

    protected $table='product_rate';

    protected $fillable=[

       'star_rating',
       'comments',
       'user_id',
       'product_id',


    ];


    public function rate(){

        return $this->hasMany(User::class);
    }

    public function user()
   {
    return $this->belongsTo(User::class);
   }


   public function Product()
   {
    return $this->belongsTo(Product::class);
   }


}
