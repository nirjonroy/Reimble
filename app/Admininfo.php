<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admininfo extends Model
{
    protected $fillable = ['name', 'username', 'password', 'email', 'mobile', 'logo', 'Is_admin'];

    // protected $guarded = ['name', 'username', 'password', 'email', 'mobile', 'logo', 'Is_admin'];   
}
