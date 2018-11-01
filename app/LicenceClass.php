<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenceClass extends Model
{
    public $table = "licence_class";
    public $timestamps = false;

    protected $fillable = [
        'licence_id','class',
    ];
}
