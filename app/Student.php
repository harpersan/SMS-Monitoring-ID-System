<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['photo_id', 'student_id', 'firstName', 'middleName', 'lastName',
							'grade_id', 'section_id', 'is_active', 'mobile_number', 'g_s_code',
							'guardian_name'];


    public function grade(){
        return $this->hasOne('App\Grade', 'id', 'grade_id');
    }

    public function section(){
        return $this->hasOne('App\Section', 'id', 'section_id');
    }

    public function photo(){
        return $this->hasOne('App\Photo', 'id', 'photo_id');
        								// 2nd value is from photo table
        								// 3rd value is from student table
        							// find to photos table where photo_id from students = id from photo;
    } 


}
