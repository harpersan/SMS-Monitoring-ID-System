<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = ['name'];

    public function user_grade(){

    	$this->belongsTo('App\User');
    }
}
