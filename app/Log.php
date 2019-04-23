<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //

    protected $fillable = ['student_id', 'is_login', 'is_logout', 'login_date', 'logout_date', 'login_time', 'logout_time', 'photo_id'];




    public function student(){

    	return $this->belongsTo('App\Student', 'student_id', 'student_id');

    }


    public function photo(){

    	return $this->belongsTo('App\Photo', 'photo_id', 'id');

    }


}
