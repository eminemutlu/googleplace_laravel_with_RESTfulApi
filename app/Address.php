<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['name', 'address','city', 'state', 'zip','latitude','longitude'];
}
