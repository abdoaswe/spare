<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provided_service extends Model
{
    use HasFactory;
   protected  $table='Provided_Services';
   protected $fillable=[
        'maintenance_id',
        'services',
    ];
    public function maintenancecenters()
    {
        return $this->belongTo(maintenancecenters::class,'maintenance_id','id');
    }
}
