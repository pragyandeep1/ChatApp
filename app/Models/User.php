<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
  
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'google_id',
        'facebook_id',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function services()
    {
        return $this->hasMany(Service::class, 'seller_name');
    }
    public function productss()
    {
        return $this->hasMany(Product::class, 'seller_name');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function customers()
    {
        return $this->hasOne(Customer::class, 'email', 'email');
    }
    // bijay start
    public function likedService()
    {
        return $this->hasMany(Likedservice::class,'user_id');
    }
    // bijay end
}
