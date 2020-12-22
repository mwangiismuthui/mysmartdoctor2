<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'password', 'permission', 'role','code','mobile_no','active',
    ];

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

    public function doctor()
    {
        return $this->hasOne('App\Doctor');
    }
    public function patient()
    {
        return $this->hasOne('App\Patient');
    }

    public function from()
    {
        return $this->hasMany('App\Chat', 'from');
    }
    public function to()
    {
        return $this->hasMany('App\Chat', 'to');
    }
}