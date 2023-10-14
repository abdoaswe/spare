<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarUser extends Model
{
    use HasFactory;

    protected $table='carsusers';
    public $timestamps=false;
    protected $fillable=[
       'brand',
       'model',
       'year',
       'user_id'

    ];


    public function caruser(){

        return $this->belongsTo(User::class,"user_id");
    }

}
