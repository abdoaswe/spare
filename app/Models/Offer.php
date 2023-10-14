<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table='Offer';

    protected $fillable=[
        'maintenance_id',
       'desc',
       'date',


    ];
    public function MaintenanceCenters()
    {
        return $this->belongsTo(MaintenanceCenters::class,'maintenance_id','id');
    }

}
