<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorymodel extends Model
{
    use HasFactory;

    protected $table='category_model';

    protected $fillable=[
       'model',
       'year'

    ];

    public function category_model(){

        return $this->hasMany(Product::class);
    }


    public function categorymodel(){

        return $this->hasOne(category_brand::class);
    }

}
