<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table='Booking';
    protected $fillable=[
        'maintenance_id',
        'user_id',
        'desc',
        'date',

     ];
     public function MaintenanceCenters()
     {
        return $this->belongsTo(MaintenanceCenters::class,'maintenance_id','id');

     }
     public function User()
     {
         return $this->belongsTo(User::class,'user_id','id');
     }

}
