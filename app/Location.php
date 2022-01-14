<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    protected $fillable = [
        'image',
        'latitude',
        'longitude',
        'store_name',
        'full_name',
        'tel',
        'address'
    ];
}
