<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;





class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'address',
        'gender',
        'phone',
        'img',
        'role',
    ];

  

    public function card(){

        return $this->hasMany(Card::class);
    }



    public function user(){

        return $this->hasOne(MaintenanceCenters::class);
    }


    public function productRate(){

        return $this->hasMany(ProductRate::class);
    }


    public function maintanceRate(){

        return $this->hasMany(MainCentersRate::class);
    }

    public function marchant(){

        return $this->hasOne(Merchant::class);
    }


    public function order(){

        return $this->hasMany(Order::class);
    }


    public function maincentar(){

        return $this->hasOne(MaintenanceCenters::class);
    }


  



    public function Booking()
    {
        return $this->hasMany(Booking::class,'user_id','id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthPassword() {
        return $this->password;
    }
}
