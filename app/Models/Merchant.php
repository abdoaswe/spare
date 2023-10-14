<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='merchant';

    protected $fillable=[
       'user_id',
       'idm',
       'idmfront',
       'idmback',
       'crmfront',
       'crmback',

    ];


    public function Product(){

        return $this->hasMany(Product::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function order(){

        return $this->hasMany(order_deteils::class);
    }
    

    public function userid(){

        return $this->belongsTo(User::class , 'user_id');
    }





}
