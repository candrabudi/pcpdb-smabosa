<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPresence extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sick_one', 
        'permission_one', 
        'alpa_one',
        'sick_two', 
        'permission_two', 
        'alpa_two', 
        'type_class'
    ];
}
