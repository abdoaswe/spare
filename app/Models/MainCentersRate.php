<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCentersRate extends Model
{
    use HasFactory;

    protected $table='maintenance_centers_rate';

    protected $fillable=[
       'user_id',
       'maintenance_id',
       'comments',

       'star_rating',



    ];

    public function maintanceRate(){

        return $this->hasMany(User::class);
    }

    public function userid(){

        return $this->belongsTo(User::class);
    }

    public function maincenter(){

        return $this->belongsTo(MaintenanceCenters::class,'maintenance_id');
    }

   

}
