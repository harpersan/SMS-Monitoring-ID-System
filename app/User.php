<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo_id', 'status_id', 'first_name', 'last_name', 'email', 'password', 'role_id', 
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


    public function admin() {

        return $this->belongsTo('App\Photo', 'photo_id', 'id');
    }

    public function status() {

        return $this->belongsTo('App\AUStatus');
    }

     public function role() {

        return $this->belongsTo('App\Role');
    }   


    public function isAdmin(){

        if($this->status_id == 1 && $this->role->name == 'Administrator') {

            return true;

        } else 

            return false;
        
    }

}
