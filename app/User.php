<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable implements MustVerifyEmail
{
   use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function balans()
  {
    return $this->hasOne('App\Balans');
  }
  public function daxod() {
    return $this->hasMany('App\Daxod');
  }
  public function rasxod() {
    return $this->hasMany('App\Rasxod');
  }
  public function daxcategor() {
    return $this->hasMany('App\DaxCategor');
  }
  public function rascategor() {
    return $this->hasMany('App\RasCategor');
  }

}
