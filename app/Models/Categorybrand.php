<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorybrand extends Model
{
    use HasFactory;


    protected $table='category_brand';

    protected $fillable=[
       'brand'

    ];


    public function category_brand(){

        return $this->hasMany(Categorymodel::class);
    }

    public function brand(){

        return $this->belongsTo(Categorymodel::class);
    }


}
