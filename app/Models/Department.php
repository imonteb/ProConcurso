<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'department_description',
    ];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    
}

