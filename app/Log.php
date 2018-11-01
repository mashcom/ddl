<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'details', 'user_id', 'status',
    ];

    public function licence_details(){
        return $this->hasOne('App\Licence','id','user_id');
    }
}
