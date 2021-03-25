<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fees extends Model
{
    //a fee statement / transaction belongs to a single student
    public function student(){
        return $this->belongsTo('App\student');
    }

    //declare this as primary key
    protected $primaryKey = 'transaction_id';
}
