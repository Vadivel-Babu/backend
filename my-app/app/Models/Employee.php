<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'email', 'img'];
}
