<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // table name
    protected $table = 'students';

    //changable
    protected $fillable = 
    [
        'name',
        'email',
        'phone',
        'course',
        'year',
        'city'
    ];
}
