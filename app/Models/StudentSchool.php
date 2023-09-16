<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchool extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'school_name', 
        'school_phone', 
        'school_address',
    ];
}
