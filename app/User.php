<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'role_id', 'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


 
    // protected $username = 'username';


    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function role(){
        return $this->belongsTo('App\Models\Roles', 'role_id');
    }


    public function status(){
        return $this->hasOne('App\Models\Statuses');
    }

    // public function loginUsername()
    // {
    //     return property_exists($this, 'username') ? $this->username : 'email';
    // }

}
