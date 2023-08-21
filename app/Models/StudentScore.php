<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_semester', 
        'second_semester', 
        'type_class'
    ];
}
