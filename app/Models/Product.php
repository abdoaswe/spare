<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,softDeletes;

    protected $table='product';

    protected $fillable=[
       'name',
       'made',
       'price',
       'type',
       'img',
       'desc',
       'star_rating',
       'comments',
       'categories_id',
       'category_model_id',
       'category_brand_id',
       'merchant_id',




    ];

    public function product(){

        return $this->belongsTo(Categories::class,"categories_id");
    }

    public function Categorymodel(){

        return $this->belongsTo(Categorymodel::class,"category_model_id");
    }


    public function Categorybrand(){

        return $this->belongsTo(Categorybrand::class,"category_brand_id");
    }


    public function Merchant(){

        return $this->belongsTo(Merchant::class,"merchant_id");
    }

    public function order(){

        return $this->hasMany(Order::class);
    }




}
