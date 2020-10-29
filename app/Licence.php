<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    public $timestamps = FALSE;


    /* public function getDobAttribute($value){
         return $value;

     }*/

    public function licence_class()
    {
        return $this->hasOne('App\LicenceClass', 'licence_id', 'id');
    }
}
