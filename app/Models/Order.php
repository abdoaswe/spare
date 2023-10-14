<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory,softDeletes;

    protected $table='order';

    protected $fillable=[
       'total_price',
       'user_id',

    ];




    public function user()
    {
     return $this->belongsTo(User::class,$foriegnkey='user_id');
    }

    public function merchent()
    {
     return $this->belongsTo(Merchant::class);
    }



}
