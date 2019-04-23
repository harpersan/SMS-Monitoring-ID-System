<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['image_name'];

    public function user_photo(){

    	$this->belongsTo('App\User');
    }


    protected $uploads = '/images/';

    public function getImageNameAttribute($photo) {

    	return $this->uploads . $photo;	

    }

}
