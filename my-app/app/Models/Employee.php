<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'img'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($employee) {
            $employee->slug = Str::slug($employee->name);
            $slugCount = Employee::where('slug', $employee->slug)->count();
            if ($slugCount > 0) {
                $employee->slug .= '-'.$slugCount + 1;
            }
        });
    }
}
