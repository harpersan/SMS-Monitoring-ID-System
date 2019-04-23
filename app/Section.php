<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = ['name'];


    public function user_section(){

    	$this->belongsTo('App\User');
    }
}
