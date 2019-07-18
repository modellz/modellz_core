<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class public_users extends Model
{
    //
    protected $table='public_users';
    protected $fillable = ['token','status'];
}
