<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    //One student pays multiple fees
    public function fees(){
        return $this->hasMany('App\fees');
    }

    /*automatically when using find
        it assumes id is primary key
        but change to tell it that student_id is primary key
    */

   // protected $primaryKey = 'student_id';

}
