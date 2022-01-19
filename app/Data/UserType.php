<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = ['name','key'];
}
