<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaintenanceCenters extends Model
{
    use HasFactory,softDeletes;

    protected $table='maintenance_centers';

    protected $fillable=[
        'user_id',
        'idmc',
        'idmcfront',
        'idmcback',
        'crmcback',
        'crmcfront',
        'center_name',
        'city',
        'address',
        'img_logo',
        'img_cover',
        'start_day',
        'end_day',
        'start_time',
        'end_time',
        'desc',
        'deleted_at'

    ];


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function userid(){

        return $this->belongsTo(User::class,"");
    }
    public function Booking()
    {
        return $this->hasMany(Booking::class,'maintenance_id','id');
    }
    public function Offer()
    {
        return $this->hasMany(Offer::class,'maintenance_id','id');
    }
    public function Provided_Service()
    {
        return $this->hasMany(Provided_service::class,'maintenance_id','id');
    }

   public function regmaicenter()
     {
        return $this->belongsTo(regmaicenter::class,'regmaicenter_id','id');
     }

   public function MainCentersRate()
   {
    return $this->hasMany(MainCentersRate::class);
   }

}
